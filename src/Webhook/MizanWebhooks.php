<?php

declare(strict_types=1);

namespace MizanCore\BaasSdk\Webhook;

/**
 * Webhook signature helpers for MizanCore BaaS partner webhooks.
 *
 * MIRRORS the backend signer EXACTLY. Source of truth:
 *   server/app/Domains/BaaS/Services/WebhookDispatchService.php:165-184
 *
 * Backend algorithm (signPayload, lines 165-174):
 *   hash_hmac('sha256', json_encode($payload, JSON_UNESCAPED_SLASHES), $secret)
 *   -> lowercase hex digest, delivered in the `X-Webhook-Signature` header.
 *
 * Backend verify (verifySignature, lines 179-184):
 *   hash_equals($expected, $signature)   // timing-safe comparison.
 *
 * CRITICAL CANONICALIZATION SUBTLETY
 * ----------------------------------
 * The backend signs the JSON RE-ENCODE of the *decoded* body (with the
 * JSON_UNESCAPED_SLASHES flag) — NOT the literal raw received bytes. So to
 * reproduce the signed string from a raw HTTP body we must:
 *
 *   1. json_decode($rawBody, assoc: true)
 *   2. json_encode($decoded, JSON_UNESCAPED_SLASHES)   // canonical signed string
 *   3. hash_hmac('sha256', $canonical, $secret)
 *   4. hash_equals($expected, $headerValue)            // timing-safe
 *
 * Verifying a naive re-serialization (or the raw bytes) instead of this exact
 * canonical form is the classic webhook-verification pitfall — it either
 * rejects valid signatures or, worse, accepts forgeries. Timing-safe compare
 * (hash_equals) prevents byte-by-byte signature guessing.
 */
final class MizanWebhooks
{
    /**
     * Verify an inbound webhook's X-Webhook-Signature against the shared secret.
     *
     * @param string $rawBody         The raw request body bytes (e.g. $request->getContent()).
     * @param string $signatureHeader The X-Webhook-Signature header value (lowercase hex).
     * @param string $secret          The partner webhook signing secret.
     */
    public static function verify(string $rawBody, string $signatureHeader, string $secret): bool
    {
        if ($signatureHeader === '' || $secret === '') {
            return false;
        }

        $expected = self::sign($rawBody, $secret);

        // Timing-safe comparison — mirrors WebhookDispatchService::verifySignature.
        return hash_equals($expected, $signatureHeader);
    }

    /**
     * Compute the X-Webhook-Signature for a raw body using the backend's exact
     * canonicalization. Used by tests to produce valid signatures, and by any
     * caller that needs to re-sign.
     *
     * @return string Lowercase hex HMAC-SHA256 digest.
     */
    public static function sign(string $rawBody, string $secret): string
    {
        $decoded = json_decode($rawBody, true);

        // If the body is not valid JSON, fall back to the raw bytes so we never
        // silently "succeed" with an empty canonical string.
        $canonical = is_array($decoded)
            ? json_encode($decoded, JSON_UNESCAPED_SLASHES)
            : $rawBody;

        if ($canonical === false) {
            $canonical = $rawBody;
        }

        return hash_hmac('sha256', $canonical, $secret);
    }
}
