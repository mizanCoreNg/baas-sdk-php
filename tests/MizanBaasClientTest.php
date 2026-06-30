<?php

declare(strict_types=1);

namespace MizanCore\BaasSdk\Tests;

use GuzzleHttp\Handler\MockHandler;
use GuzzleHttp\HandlerStack;
use GuzzleHttp\Psr7\Response;
use MizanCore\BaasSdk\MizanBaasClient;
use MizanCore\BaasSdk\Support\Uuid;
use PHPUnit\Framework\TestCase;
use Psr\Http\Message\RequestInterface;

/**
 * End-to-end checks on the assembled MizanBaasClient.
 *
 * We assert against MockHandler::getLastRequest() — the INNERMOST request, i.e.
 * exactly the bytes the server would receive after every SDK middleware (auth,
 * idempotency, retry) has run. Asserting an outer history middleware would read
 * the request BEFORE idempotency mutated it and give false negatives.
 */
final class MizanBaasClientTest extends TestCase
{
    private MockHandler $mock;

    private function client(Response $response, string $env = 'test', ?string $tenantId = null): MizanBaasClient
    {
        $this->mock = new MockHandler([$response, $response]);

        return new MizanBaasClient(
            apiKey: 'pk_test_abc123',
            environment: $env,
            tenantId: $tenantId,
            guzzleConfig: ['handler' => HandlerStack::create($this->mock)],
        );
    }

    private function wireRequest(): RequestInterface
    {
        return $this->mock->getLastRequest();
    }

    public function test_sends_x_api_key_header_not_partner_key(): void
    {
        // REGRESSION GUARD: the BaaS backend reads the API key from X-API-Key
        // (BaasAuthMiddleware: $request->header('X-API-Key') ?? bearerToken()).
        // It does NOT read X-Partner-Key. The wrong header => 401 for every
        // real partner call.
        $client = $this->client(new Response(200, [], '{"success":true,"data":{}}'));

        $client->get('/baas/wallet/balance');

        $sent = $this->wireRequest();
        $this->assertSame('pk_test_abc123', $sent->getHeaderLine('X-API-Key'),
            'SDK MUST authenticate with X-API-Key');
        $this->assertFalse($sent->hasHeader('X-Partner-Key'),
            'SDK MUST NOT send X-Partner-Key (backend ignores it -> 401)');
    }

    public function test_sends_tenant_header_when_configured(): void
    {
        $client = $this->client(new Response(200, [], '{"success":true}'), 'test', 'world.test.localhost');
        $client->get('/baas/balance');
        $this->assertSame('world.test.localhost', $this->wireRequest()->getHeaderLine('X-Tenant-ID'));
    }

    public function test_resolves_test_base_url(): void
    {
        $client = $this->client(new Response(200, [], '{"success":true}'), 'test');
        $this->assertSame('https://test-api.mizancore.ng/api/v1', $client->baseUrl());

        $client->get('/baas/balance');
        $this->assertStringStartsWith(
            'https://test-api.mizancore.ng/api/v1/baas/balance',
            (string) $this->wireRequest()->getUri()
        );
    }

    public function test_resolves_live_base_url(): void
    {
        $client = $this->client(new Response(200, [], '{"success":true}'), 'live');
        $this->assertSame('https://api.mizancore.ng/api/v1', $client->baseUrl());
    }

    public function test_post_auto_adds_uuid_idempotency_key_through_client(): void
    {
        $client = $this->client(new Response(201, [], '{"success":true,"data":{}}'));

        $client->post('/baas/virtual-accounts', ['customer_id' => 'c1']);

        $key = $this->wireRequest()->getHeaderLine('Idempotency-Key');
        $this->assertTrue(Uuid::isValid($key), "Auto idempotency key '$key' must be a UUIDv4");
        $this->assertSame('4', $key[14], 'Must be a v4 UUID');
    }

    public function test_post_preserves_caller_idempotency_key_through_client(): void
    {
        $client = $this->client(new Response(201, [], '{"success":true,"data":{}}'));

        $client->post('/baas/virtual-accounts', ['customer_id' => 'c1'], 'fixed-key-xyz');

        $this->assertSame('fixed-key-xyz', $this->wireRequest()->getHeaderLine('Idempotency-Key'));
    }

    public function test_get_does_not_add_idempotency_key_through_client(): void
    {
        $client = $this->client(new Response(200, [], '{"success":true}'));

        $client->get('/baas/transactions');

        $this->assertFalse($this->wireRequest()->hasHeader('Idempotency-Key'),
            'GET (read) must not carry an Idempotency-Key');
    }
}
