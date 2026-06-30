<?php

declare(strict_types=1);

namespace MizanCore\BaasSdk\Http;

use GuzzleHttp\Exception\BadResponseException;
use GuzzleHttp\Promise\PromiseInterface;
use GuzzleHttp\Psr7\Utils;
use MizanCore\BaasSdk\Exception\BaasApiException;
use MizanCore\BaasSdk\Support\Uuid;
use Psr\Http\Message\RequestInterface;
use Psr\Http\Message\ResponseInterface;

/**
 * Guzzle handler-stack middleware for the MizanCore BaaS SDK value-add layer.
 *
 * Three concerns are wired here:
 *   1. idempotency()    — auto-fill Idempotency-Key on write verbs.
 *   2. retry()          — exponential backoff on 429 + 5xx honouring Retry-After.
 *   3. mapErrors()      — turn non-2xx {success:false,...} envelopes into typed
 *                          BaasApiException subclasses.
 */
final class Middleware
{
    private const WRITE_METHODS = ['POST', 'PUT', 'PATCH'];

    /**
     * Auto-fill an Idempotency-Key header for write requests when the caller
     * did not supply one. A caller-supplied key is always preserved.
     *
     * Rationale: payment SDKs (Stripe, Adyen) auto-generate the idempotency key
     * for writes so accidental client retries never double-charge.
     *   - Stripe:  https://docs.stripe.com/api/idempotent_requests
     *   - Adyen:   https://docs.adyen.com/development-resources/api-idempotency/
     */
    public static function idempotency(): callable
    {
        return static function (callable $handler): callable {
            return static function (RequestInterface $request, array $options) use ($handler): PromiseInterface {
                if (
                    in_array(strtoupper($request->getMethod()), self::WRITE_METHODS, true)
                    && !$request->hasHeader('Idempotency-Key')
                ) {
                    $request = $request->withHeader('Idempotency-Key', Uuid::v4());
                }

                return $handler($request, $options);
            };
        };
    }

    /**
     * Exponential-backoff retry middleware for transient failures.
     *
     * Retries on HTTP 429 and 5xx (and on connection-level transport errors).
     * Honours the Retry-After header (delta-seconds or HTTP-date). Backoff is
     * jittered: base * 2^attempt + random(0..base).
     *
     * @param int $maxRetries Hard cap on retry attempts (in addition to the first try).
     * @param int $baseDelayMs Base backoff in milliseconds.
     */
    public static function retry(int $maxRetries = 3, int $baseDelayMs = 200): callable
    {
        $decider = static function (
            int $retries,
            RequestInterface $request,
            ?ResponseInterface $response = null,
            ?\Throwable $exception = null
        ) use ($maxRetries): bool {
            if ($retries >= $maxRetries) {
                return false;
            }
            if ($response !== null) {
                $status = $response->getStatusCode();

                return $status === 429 || $status >= 500;
            }

            // Connection-level failure (no response): retry.
            return $exception !== null;
        };

        $delay = static function (
            int $retries,
            ?ResponseInterface $response = null
        ) use ($baseDelayMs): int {
            // Retry-After takes precedence when present (RFC 7231 §7.1.3).
            if ($response !== null && $response->hasHeader('Retry-After')) {
                $retryAfter = self::parseRetryAfter($response->getHeaderLine('Retry-After'));
                if ($retryAfter !== null) {
                    return $retryAfter * 1000;
                }
            }

            $jitter = random_int(0, $baseDelayMs);

            return ($baseDelayMs * (2 ** $retries)) + $jitter;
        };

        // Mirror of GuzzleHttp\Middleware::retry, but typed for clarity.
        return static function (callable $handler) use ($decider, $delay): callable {
            return new \GuzzleHttp\RetryMiddleware($decider, $handler, $delay);
        };
    }

    /**
     * Map a non-2xx {success:false,...} envelope to a typed BaasApiException.
     *
     * Works regardless of Guzzle's `http_errors` setting / middleware order:
     *   - on a FULFILLED non-2xx response, it throws the typed exception itself
     *     (so it does not depend on http_errors having run first);
     *   - on a REJECTION that is a BadResponseException (http_errors already
     *     threw), it re-maps that to the typed exception.
     */
    public static function mapErrors(): callable
    {
        return static function (callable $handler): callable {
            return static function (RequestInterface $request, array $options) use ($handler): PromiseInterface {
                return $handler($request, $options)->then(
                    static function (ResponseInterface $response) {
                        $status = $response->getStatusCode();
                        if ($status >= 400) {
                            throw BaasApiException::fromResponse($response);
                        }

                        return $response;
                    },
                    static function (\Throwable $reason) {
                        if ($reason instanceof BadResponseException) {
                            throw BaasApiException::fromResponse($reason->getResponse(), $reason);
                        }

                        throw $reason;
                    }
                );
            };
        };
    }

    /**
     * Parse a Retry-After header value into whole seconds, or null if unparseable.
     */
    public static function parseRetryAfter(string $value): ?int
    {
        $value = trim($value);
        if ($value === '') {
            return null;
        }
        if (ctype_digit($value)) {
            return (int) $value;
        }

        $when = strtotime($value);
        if ($when === false) {
            return null;
        }

        return max(0, $when - time());
    }
}
