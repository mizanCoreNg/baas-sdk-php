<?php

declare(strict_types=1);

namespace MizanCore\BaasSdk\Tests;

use GuzzleHttp\Client;
use GuzzleHttp\Handler\MockHandler;
use GuzzleHttp\HandlerStack;
use GuzzleHttp\Middleware as GuzzleMiddleware;
use GuzzleHttp\Psr7\Response;
use MizanCore\BaasSdk\Http\Middleware;
use MizanCore\BaasSdk\Support\Uuid;
use PHPUnit\Framework\TestCase;
use Psr\Http\Message\RequestInterface;

final class IdempotencyMiddlewareTest extends TestCase
{
    /** @var array<int,array<string,mixed>> */
    private array $history = [];

    private function makeClient(MockHandler $mock): Client
    {
        $stack = HandlerStack::create($mock);
        $stack->push(Middleware::idempotency(), 'mizan_idempotency');
        $stack->push(GuzzleMiddleware::history($this->history), 'history');

        return new Client(['handler' => $stack]);
    }

    public function test_idempotency_key_auto_added_on_post_when_absent(): void
    {
        $mock = new MockHandler([new Response(201, [], '{"success":true}')]);
        $client = $this->makeClient($mock);

        $client->post('https://example.test/api/v1/baas/customers', ['body' => '{}']);

        /** @var RequestInterface $sent */
        $sent = $this->history[0]['request'];
        $this->assertTrue($sent->hasHeader('Idempotency-Key'), 'Idempotency-Key should be auto-added');
        $key = $sent->getHeaderLine('Idempotency-Key');
        $this->assertTrue(Uuid::isValid($key), "Auto key '$key' must be a valid UUIDv4");
        // Version nibble must be 4.
        $this->assertSame('4', $key[14]);
    }

    public function test_idempotency_key_preserved_when_caller_supplies_one(): void
    {
        $mock = new MockHandler([new Response(201, [], '{"success":true}')]);
        $client = $this->makeClient($mock);

        $supplied = 'caller-supplied-key-123';
        $client->post('https://example.test/api/v1/baas/customers', [
            'headers' => ['Idempotency-Key' => $supplied],
            'body' => '{}',
        ]);

        /** @var RequestInterface $sent */
        $sent = $this->history[0]['request'];
        $this->assertSame($supplied, $sent->getHeaderLine('Idempotency-Key'));
    }

    public function test_idempotency_key_not_added_on_get(): void
    {
        $mock = new MockHandler([new Response(200, [], '{"success":true}')]);
        $client = $this->makeClient($mock);

        $client->get('https://example.test/api/v1/baas/transactions');

        /** @var RequestInterface $sent */
        $sent = $this->history[0]['request'];
        $this->assertFalse($sent->hasHeader('Idempotency-Key'), 'GET must not carry an Idempotency-Key');
    }
}
