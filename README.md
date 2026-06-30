# mizancore/baas-sdk (PHP)

PHP SDK for the MizanCore Banking-as-a-Service API. An OpenAPI-generated client
wrapped in a hand-written value-add layer (auto idempotency keys, retry/backoff,
typed errors, webhook signature verification).

Requires PHP `^8.2`.

## Install

```bash
composer require mizancore/baas-sdk
```

The generated client lives in `generated/` and is committed (so reviewers can
read it without running Docker). To regenerate, run `../generate.sh`.

## Quickstart

```php
use MizanCore\BaasSdk\MizanBaasClient;
use MizanCore\BaasSdk\Generated\Api\BaaSVirtualAccountsApi;
use MizanCore\BaasSdk\Exception\BaasApiException;

$client = new MizanBaasClient(
    apiKey: 'pk_test_xxx',          // -> X-Partner-Key
    environment: 'test',            // 'test' (test-api) | 'live' (api)
    tenantId: 'world.test.localhost' // -> X-Tenant-ID (optional, non-prod)
);

// A generated *Api class wired to the configured Guzzle stack:
//   - Idempotency-Key auto-added on writes
//   - 429/5xx retried with backoff (honours Retry-After)
//   - non-2xx {success:false,...} mapped to typed BaasApiException
$accounts = $client->api(BaaSVirtualAccountsApi::class);

try {
    $result = $accounts->virtualAccountCreate(/* per generated signature */);
} catch (BaasApiException $e) {
    // $e->getHttpStatus(), $e->getErrorCode(), $e->getErrors()
}
```

## Verifying webhooks (framework-agnostic)

```php
use MizanCore\BaasSdk\Webhook\MizanWebhooks;

$raw = file_get_contents('php://input');           // RAW body — do not re-encode
$sig = $_SERVER['HTTP_X_WEBHOOK_SIGNATURE'] ?? '';

if (!MizanWebhooks::verify($raw, $sig, $webhookSecret)) {
    http_response_code(401);
    exit;
}
```

`verify()` reproduces the backend's exact canonicalization —
`hash_hmac('sha256', json_encode(json_decode($raw, true), JSON_UNESCAPED_SLASHES), $secret)` —
and compares timing-safely (`hash_equals`). See the docblock on `MizanWebhooks`
and the mirrored backend source `WebhookDispatchService.php:165-184`.

## Tests

```bash
composer install
composer test
```

Tests cover the value-add layer only (idempotency auto-key, webhook verify,
error mapping) — not the generated code.
