<?php

declare(strict_types=1);

namespace MizanCore\BaasSdk\Tests;

use GuzzleHttp\Client;
use GuzzleHttp\Handler\MockHandler;
use GuzzleHttp\HandlerStack;
use GuzzleHttp\Psr7\Response;
use MizanCore\BaasSdk\Exception\BaasApiException;
use MizanCore\BaasSdk\Exception\BaasAuthException;
use MizanCore\BaasSdk\Exception\BaasRateLimitException;
use MizanCore\BaasSdk\Exception\BaasValidationException;
use MizanCore\BaasSdk\Http\Middleware;
use PHPUnit\Framework\TestCase;

final class ErrorMappingTest extends TestCase
{
    private function clientReturning(Response ...$responses): Client
    {
        $stack = HandlerStack::create(new MockHandler($responses));
        // No retry middleware here so 429/5xx surface immediately for assertion.
        $stack->push(Middleware::mapErrors(), 'mizan_error_mapping');

        return new Client(['handler' => $stack, 'http_errors' => false]); // mapErrors throws on fulfilled non-2xx
    }

    public function test_422_maps_to_validation_exception_with_errors(): void
    {
        $body = json_encode([
            'success' => false,
            'message' => 'Validation failed',
            'errors' => ['customer_reference' => ['The customer reference field is required.']],
        ]);
        $client = $this->clientReturning(new Response(422, [], $body));

        try {
            $client->post('https://example.test/x', ['body' => '{}']);
            $this->fail('Expected BaasValidationException');
        } catch (BaasValidationException $e) {
            $this->assertSame(422, $e->getHttpStatus());
            $this->assertSame('Validation failed', $e->getMessage());
            $this->assertArrayHasKey('customer_reference', $e->getErrors());
            $this->assertInstanceOf(BaasApiException::class, $e);
        }
    }

    public function test_401_maps_to_auth_exception(): void
    {
        $body = json_encode(['success' => false, 'message' => 'Unauthenticated.', 'errors' => []]);
        $client = $this->clientReturning(new Response(401, [], $body));

        $this->expectException(BaasAuthException::class);
        $client->get('https://example.test/x');
    }

    public function test_429_maps_to_rate_limit_exception(): void
    {
        $body = json_encode(['success' => false, 'message' => 'Too Many Requests', 'errors' => []]);
        $client = $this->clientReturning(new Response(429, [], $body));

        try {
            $client->get('https://example.test/x');
            $this->fail('Expected BaasRateLimitException');
        } catch (BaasRateLimitException $e) {
            $this->assertSame(429, $e->getHttpStatus());
        }
    }

    public function test_500_maps_to_base_exception(): void
    {
        $client = $this->clientReturning(new Response(500, [], '{"success":false,"message":"Server error"}'));

        try {
            $client->get('https://example.test/x');
            $this->fail('Expected BaasApiException');
        } catch (BaasApiException $e) {
            $this->assertSame(500, $e->getHttpStatus());
            $this->assertSame('Server error', $e->getMessage());
        }
    }

    public function test_retry_after_header_parsing(): void
    {
        $this->assertSame(5, Middleware::parseRetryAfter('5'));
        $this->assertNull(Middleware::parseRetryAfter(''));
        $this->assertNull(Middleware::parseRetryAfter('not-a-date'));
    }
}
