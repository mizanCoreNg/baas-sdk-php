<?php

declare(strict_types=1);

namespace MizanCore\BaasSdk\Tests;

use MizanCore\BaasSdk\Webhook\MizanWebhooks;
use PHPUnit\Framework\TestCase;

final class WebhookSignatureTest extends TestCase
{
    private const SECRET = 'whsec_test_0123456789abcdef';

    public function test_verify_passes_on_correctly_signed_body(): void
    {
        // Slashes in the payload exercise the JSON_UNESCAPED_SLASHES canonicalization.
        $rawBody = '{"event":"virtual_account.credited","data":{"url":"https://x/y","ref":"REF-1"}}';
        $sig = MizanWebhooks::sign($rawBody, self::SECRET);

        $this->assertTrue(MizanWebhooks::verify($rawBody, $sig, self::SECRET));
    }

    public function test_sign_matches_backend_canonicalization(): void
    {
        // Reproduce the backend exactly: hmac over json_encode(decode(raw), UNESCAPED_SLASHES).
        $rawBody = '{"a":"http:\/\/escaped\/slashes","n":1}';
        $canonical = json_encode(json_decode($rawBody, true), JSON_UNESCAPED_SLASHES);
        $expected = hash_hmac('sha256', $canonical, self::SECRET);

        $this->assertSame($expected, MizanWebhooks::sign($rawBody, self::SECRET));
        // And the canonical form unescaped the slashes vs the raw input.
        $this->assertStringContainsString('http://escaped/slashes', $canonical);
    }

    public function test_verify_fails_on_tampered_body(): void
    {
        $rawBody = '{"event":"transfer.completed","amount":150050}';
        $sig = MizanWebhooks::sign($rawBody, self::SECRET);

        $tampered = '{"event":"transfer.completed","amount":15005000}';
        $this->assertFalse(MizanWebhooks::verify($tampered, $sig, self::SECRET));
    }

    public function test_verify_fails_on_single_byte_signature_diff(): void
    {
        $rawBody = '{"event":"x"}';
        $sig = MizanWebhooks::sign($rawBody, self::SECRET);

        // Flip the last hex nibble — timing-safe hash_equals must reject it.
        $last = substr($sig, -1);
        $flip = $last === '0' ? '1' : '0';
        $bad = substr($sig, 0, -1) . $flip;

        $this->assertNotSame($sig, $bad);
        $this->assertFalse(MizanWebhooks::verify($rawBody, $bad, self::SECRET));
    }

    public function test_verify_fails_on_empty_signature_or_secret(): void
    {
        $rawBody = '{"event":"x"}';
        $this->assertFalse(MizanWebhooks::verify($rawBody, '', self::SECRET));
        $this->assertFalse(MizanWebhooks::verify($rawBody, 'abc', ''));
    }
}
