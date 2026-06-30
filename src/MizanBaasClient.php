<?php

declare(strict_types=1);

namespace MizanCore\BaasSdk;

use GuzzleHttp\Client as GuzzleClient;
use GuzzleHttp\HandlerStack;
use MizanCore\BaasSdk\Generated\Configuration;
use MizanCore\BaasSdk\Http\Middleware;
use Psr\Http\Message\ResponseInterface;

/**
 * Configured entry point for the MizanCore BaaS SDK — the hand-written
 * value-add layer over the OpenAPI-generated client.
 *
 * Wires the Guzzle handler stack with:
 *   - X-API-Key auth header on every request (the BaaS backend reads
 *     securitySchemes apiKeyAuth header — baas.yaml).
 *   - Auto Idempotency-Key (UUIDv4) on POST/PUT/PATCH when caller omits one.
 *   - Exponential-backoff retry on 429/5xx honouring Retry-After.
 *   - Typed BaasApiException mapping for the {success,message,errors} envelope.
 *
 * The same configured Guzzle client backs the generated \MizanCore\BaasSdk\
 * Generated\Api\* classes via api(), so generated calls inherit auth + retry +
 * idempotency + typed errors.
 *
 * Usage:
 *   $client = new MizanBaasClient(apiKey: 'pk_...', environment: 'test');
 *   $api    = $client->api(\MizanCore\BaasSdk\Generated\Api\BaaSVirtualAccountsApi::class);
 *   // or the raw helpers:
 *   $data   = $client->post('/baas/virtual-accounts', ['customer_id' => '...']);
 */
final class MizanBaasClient
{
    public const ENV_TEST = 'test';
    public const ENV_LIVE = 'live';

    /**
     * Base URLs from the BaaS OpenAPI `servers:` block. All BaaS paths mount
     * under /api/v1/baas, so the base URL includes the /api/v1 prefix.
     */
    private const BASE_URLS = [
        self::ENV_TEST => 'https://test-api.mizancore.ng/api/v1',
        self::ENV_LIVE => 'https://api.mizancore.ng/api/v1',
    ];

    private readonly string $apiKey;
    private readonly string $baseUrl;
    private readonly ?string $tenantId;
    private readonly GuzzleClient $httpClient;

    /**
     * @param string              $apiKey       Partner API key (sent as X-API-Key).
     * @param string              $environment  'test' (default) or 'live'.
     * @param string|null         $baseUrl      Explicit base URL override (wins over $environment).
     * @param string|null         $tenantId     Optional tenant id (sent as X-Tenant-ID for non-prod routing).
     * @param int                 $maxRetries   Retry cap for 429/5xx (default 3).
     * @param array<string,mixed> $guzzleConfig Extra Guzzle config (timeout, proxy, or a HandlerStack under 'handler' for tests).
     */
    public function __construct(
        string $apiKey,
        string $environment = self::ENV_TEST,
        ?string $baseUrl = null,
        ?string $tenantId = null,
        int $maxRetries = 3,
        array $guzzleConfig = [],
    ) {
        $this->apiKey = $apiKey;
        $this->tenantId = $tenantId;
        $this->baseUrl = rtrim(
            $baseUrl ?? (self::BASE_URLS[$environment] ?? self::BASE_URLS[self::ENV_TEST]),
            '/'
        );

        // Allow tests to inject a mock handler stack.
        $stack = ($guzzleConfig['handler'] ?? null) instanceof HandlerStack
            ? $guzzleConfig['handler']
            : HandlerStack::create();
        unset($guzzleConfig['handler']);

        // Push order: idempotency must mutate the request before retry sees it;
        // retry must inspect the raw 429/5xx RESPONSE (which requires
        // http_errors OFF, otherwise those become rejections before retry's
        // decider runs); mapErrors is outermost and throws the SDK's typed
        // exception on the fulfilled non-2xx path.
        $stack->push(Middleware::idempotency(), 'mizan_idempotency');
        $stack->push(Middleware::retry($maxRetries), 'mizan_retry');
        $stack->push(Middleware::mapErrors(), 'mizan_error_mapping');

        // X-API-Key is the BaaS API key header. Source of truth:
        // server BaasAuthMiddleware: \$request->header('X-API-Key') ?? bearerToken().
        // (NOT X-Partner-Key.)
        $headers = [
            'X-API-Key'     => $this->apiKey,
            'Accept'        => 'application/json',
            'User-Agent'    => 'mizancore-baas-php-sdk/0.1',
        ];
        if ($this->tenantId !== null && $this->tenantId !== '') {
            $headers['X-Tenant-ID'] = $this->tenantId;
        }

        $this->httpClient = new GuzzleClient(array_merge([
            'handler'     => $stack,
            'base_uri'    => $this->baseUrl . '/',
            'headers'     => $headers,
            // http_errors OFF: retry inspects responses; mapErrors throws typed.
            'http_errors' => false,
        ], $guzzleConfig));
    }

    /**
     * Build the OpenAPI-generated Configuration object pre-loaded with the
     * partner key, tenant header and resolved host.
     */
    public function configuration(): Configuration
    {
        $config = (new Configuration())
            ->setApiKey('X-API-Key', $this->apiKey)
            ->setHost($this->baseUrl);

        if ($this->tenantId !== null && $this->tenantId !== '') {
            $config->setApiKey('X-Tenant-ID', $this->tenantId);
        }

        return $config;
    }

    /**
     * Instantiate a generated *Api class wired to this client's configured
     * Guzzle stack (idempotency + retry + typed errors) and Configuration.
     *
     * @template T of object
     * @param class-string<T> $apiClass A generated Api class FQCN.
     * @return T
     */
    public function api(string $apiClass): object
    {
        return new $apiClass($this->httpClient, $this->configuration());
    }

    public function httpClient(): GuzzleClient
    {
        return $this->httpClient;
    }

    public function baseUrl(): string
    {
        return $this->baseUrl;
    }

    /**
     * Convenience: GET a BaaS path, return the decoded body.
     *
     * @param array<string,mixed> $query
     * @return array<string,mixed>
     */
    public function get(string $path, array $query = []): array
    {
        return $this->decode($this->httpClient->get(ltrim($path, '/'), ['query' => $query]));
    }

    /**
     * Convenience: POST JSON. An Idempotency-Key is auto-added by the
     * middleware unless $idempotencyKey is supplied.
     *
     * @param array<string,mixed> $body
     * @return array<string,mixed>
     */
    public function post(string $path, array $body = [], ?string $idempotencyKey = null): array
    {
        $options = ['json' => $body];
        if ($idempotencyKey !== null) {
            $options['headers'] = ['Idempotency-Key' => $idempotencyKey];
        }

        return $this->decode($this->httpClient->post(ltrim($path, '/'), $options));
    }

    /**
     * @return array<string,mixed>
     */
    private function decode(ResponseInterface $response): array
    {
        $decoded = json_decode((string) $response->getBody(), true);

        return is_array($decoded) ? $decoded : [];
    }
}
