# MizanCore\BaasSdk\Generated\DeveloperPortalWebhookTestingApi

All URIs are relative to https://api.mizancore.ng, except if the operation defines another base path.

| Method | HTTP request | Description |
| ------------- | ------------- | ------------- |
| [**webhookTestingSendTestEvent()**](DeveloperPortalWebhookTestingApi.md#webhookTestingSendTestEvent) | **POST** /api/v1/developer/webhooks/{subscriptionId}/test | Send a test webhook event |


## `webhookTestingSendTestEvent()`

```php
webhookTestingSendTestEvent($subscription_id, $x_tenant_id, $send_test_webhook_request): \MizanCore\BaasSdk\Generated\Model\VirtualAccountQueryIndex200Response
```

Send a test webhook event

Sends a test webhook payload to the specified subscription URL synchronously and returns the delivery result. Useful for verifying endpoint connectivity.

### Example

```php
<?php
require_once(__DIR__ . '/vendor/autoload.php');


// Configure API key authorization: tenantHeader
$config = MizanCore\BaasSdk\Generated\Configuration::getDefaultConfiguration()->setApiKey('X-Tenant-ID', 'YOUR_API_KEY');
// Uncomment below to setup prefix (e.g. Bearer) for API key, if needed
// $config = MizanCore\BaasSdk\Generated\Configuration::getDefaultConfiguration()->setApiKeyPrefix('X-Tenant-ID', 'Bearer');

// Configure API key authorization: hmacAuth
$config = MizanCore\BaasSdk\Generated\Configuration::getDefaultConfiguration()->setApiKey('X-Signature', 'YOUR_API_KEY');
// Uncomment below to setup prefix (e.g. Bearer) for API key, if needed
// $config = MizanCore\BaasSdk\Generated\Configuration::getDefaultConfiguration()->setApiKeyPrefix('X-Signature', 'Bearer');

// Configure API key authorization: apiKeyAuth
$config = MizanCore\BaasSdk\Generated\Configuration::getDefaultConfiguration()->setApiKey('X-Partner-Key', 'YOUR_API_KEY');
// Uncomment below to setup prefix (e.g. Bearer) for API key, if needed
// $config = MizanCore\BaasSdk\Generated\Configuration::getDefaultConfiguration()->setApiKeyPrefix('X-Partner-Key', 'Bearer');


$apiInstance = new MizanCore\BaasSdk\Generated\Api\DeveloperPortalWebhookTestingApi(
    // If you want use custom http client, pass your client which implements `GuzzleHttp\ClientInterface`.
    // This is optional, `GuzzleHttp\Client` will be used as default.
    new GuzzleHttp\Client(),
    $config
);
$subscription_id = 00000000-0000-0000-0000-000000000001; // string
$x_tenant_id = world.test.localhost; // string | Tenant identifier (UUID or domain, e.g. world.test.localhost). Required on every tenant-scoped route. Maps to the tenant whose database serves this request. In production, prefer Host-header-based resolution; X-Tenant-ID is intended for non-production environments and is rejected (HTTP 400) on production hosts.
$send_test_webhook_request = {"event_type":"virtual_account.created"}; // \MizanCore\BaasSdk\Generated\Model\SendTestWebhookRequest

try {
    $result = $apiInstance->webhookTestingSendTestEvent($subscription_id, $x_tenant_id, $send_test_webhook_request);
    print_r($result);
} catch (Exception $e) {
    echo 'Exception when calling DeveloperPortalWebhookTestingApi->webhookTestingSendTestEvent: ', $e->getMessage(), PHP_EOL;
}
```

### Parameters

| Name | Type | Description  | Notes |
| ------------- | ------------- | ------------- | ------------- |
| **subscription_id** | **string**|  | |
| **x_tenant_id** | **string**| Tenant identifier (UUID or domain, e.g. world.test.localhost). Required on every tenant-scoped route. Maps to the tenant whose database serves this request. In production, prefer Host-header-based resolution; X-Tenant-ID is intended for non-production environments and is rejected (HTTP 400) on production hosts. | |
| **send_test_webhook_request** | [**\MizanCore\BaasSdk\Generated\Model\SendTestWebhookRequest**](../Model/SendTestWebhookRequest.md)|  | |

### Return type

[**\MizanCore\BaasSdk\Generated\Model\VirtualAccountQueryIndex200Response**](../Model/VirtualAccountQueryIndex200Response.md)

### Authorization

[tenantHeader](../../README.md#tenantHeader), [hmacAuth](../../README.md#hmacAuth), [apiKeyAuth](../../README.md#apiKeyAuth)

### HTTP request headers

- **Content-Type**: `application/json`
- **Accept**: `application/json`

[[Back to top]](#) [[Back to API list]](../../README.md#endpoints)
[[Back to Model list]](../../README.md#models)
[[Back to README]](../../README.md)
