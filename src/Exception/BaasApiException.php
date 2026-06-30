<?php

declare(strict_types=1);

namespace MizanCore\BaasSdk\Exception;

use Psr\Http\Message\ResponseInterface;

/**
 * Base typed exception for non-2xx MizanCore BaaS API responses.
 *
 * Maps the standard error envelope { success:false, message, errors } onto a
 * structured exception carrying the HTTP status, a machine error code, the
 * human message, and the field-level errors array.
 */
class BaasApiException extends \RuntimeException
{
    /**
     * @param array<string,mixed> $errors Field-level validation errors (envelope `errors`).
     */
    public function __construct(
        string $message,
        public readonly int $httpStatus,
        public readonly ?string $errorCode = null,
        public readonly array $errors = [],
        public readonly ?ResponseInterface $response = null,
        ?\Throwable $previous = null
    ) {
        parent::__construct($message, $httpStatus, $previous);
    }

    public function getHttpStatus(): int
    {
        return $this->httpStatus;
    }

    public function getErrorCode(): ?string
    {
        return $this->errorCode;
    }

    /** @return array<string,mixed> */
    public function getErrors(): array
    {
        return $this->errors;
    }

    /**
     * Factory: build the correct typed exception from a PSR-7 response.
     *
     * Decodes the { success:false, message, errors } envelope. Falls back to a
     * generic message when the body is not the expected JSON shape.
     */
    public static function fromResponse(
        ?ResponseInterface $response,
        ?\Throwable $previous = null
    ): self {
        $status = $response?->getStatusCode() ?? 0;
        $message = 'MizanCore BaaS API request failed.';
        $errorCode = null;
        $errors = [];

        if ($response !== null) {
            $body = (string) $response->getBody();
            // Rewind so callers can still read the stream if needed.
            if ($response->getBody()->isSeekable()) {
                $response->getBody()->rewind();
            }

            $decoded = json_decode($body, true);
            if (is_array($decoded)) {
                if (isset($decoded['message']) && is_string($decoded['message'])) {
                    $message = $decoded['message'];
                }
                // Some envelopes carry an explicit `code`/`error_code`; prefer it.
                foreach (['code', 'error_code', 'errorCode'] as $codeKey) {
                    if (isset($decoded[$codeKey]) && is_scalar($decoded[$codeKey])) {
                        $errorCode = (string) $decoded[$codeKey];
                        break;
                    }
                }
                if (isset($decoded['errors']) && is_array($decoded['errors'])) {
                    $errors = $decoded['errors'];
                }
            }
        }

        return match (true) {
            $status === 401, $status === 403 => new BaasAuthException($message, $status, $errorCode, $errors, $response, $previous),
            $status === 422               => new BaasValidationException($message, $status, $errorCode, $errors, $response, $previous),
            $status === 429               => new BaasRateLimitException($message, $status, $errorCode, $errors, $response, $previous),
            default                       => new self($message, $status, $errorCode, $errors, $response, $previous),
        };
    }
}
