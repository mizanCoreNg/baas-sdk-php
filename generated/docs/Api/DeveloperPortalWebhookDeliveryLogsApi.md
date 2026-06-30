# MizanCore\BaasSdk\Generated\DeveloperPortalWebhookDeliveryLogsApi

All URIs are relative to https://api.mizancore.ng, except if the operation defines another base path.

| Method | HTTP request | Description |
| ------------- | ------------- | ------------- |
| [**webhookDeliveryLogIndex()**](DeveloperPortalWebhookDeliveryLogsApi.md#webhookDeliveryLogIndex) | **GET** /api/v1/developer/webhooks/deliveries | List webhook delivery logs |
| [**webhookDeliveryLogRetry()**](DeveloperPortalWebhookDeliveryLogsApi.md#webhookDeliveryLogRetry) | **POST** /api/v1/developer/webhooks/deliveries/{id}/retry | Retry a failed webhook delivery |


## `webhookDeliveryLogIndex()`

```php
webhookDeliveryLogIndex($x_tenant_id): \MizanCore\BaasSdk\Generated\Model\WebhookSubscriptionDestroy204Response
```

List webhook delivery logs

Returns a paginated list of webhook delivery attempts for the authenticated partner, with optional filtering by status and event type.

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
$config = MizanCore\BaasSdk\Generated\Configuration::getDefaultConfiguration()->setApiKey('X-API-Key', 'YOUR_API_KEY');
// Uncomment below to setup prefix (e.g. Bearer) for API key, if needed
// $config = MizanCore\BaasSdk\Generated\Configuration::getDefaultConfiguration()->setApiKeyPrefix('X-API-Key', 'Bearer');


$apiInstance = new MizanCore\BaasSdk\Generated\Api\DeveloperPortalWebhookDeliveryLogsApi(
    // If you want use custom http client, pass your client which implements `GuzzleHttp\ClientInterface`.
    // This is optional, `GuzzleHttp\Client` will be used as default.
    new GuzzleHttp\Client(),
    $config
);
$x_tenant_id = world.test.localhost; // string | Tenant identifier (UUID or domain, e.g. world.test.localhost). Required on every tenant-scoped route. Maps to the tenant whose database serves this request. In production, prefer Host-header-based resolution; X-Tenant-ID is intended for non-production environments and is rejected (HTTP 400) on production hosts.

try {
    $result = $apiInstance->webhookDeliveryLogIndex($x_tenant_id);
    print_r($result);
} catch (Exception $e) {
    echo 'Exception when calling DeveloperPortalWebhookDeliveryLogsApi->webhookDeliveryLogIndex: ', $e->getMessage(), PHP_EOL;
}
```

### Parameters

| Name | Type | Description  | Notes |
| ------------- | ------------- | ------------- | ------------- |
| **x_tenant_id** | **string**| Tenant identifier (UUID or domain, e.g. world.test.localhost). Required on every tenant-scoped route. Maps to the tenant whose database serves this request. In production, prefer Host-header-based resolution; X-Tenant-ID is intended for non-production environments and is rejected (HTTP 400) on production hosts. | |

### Return type

[**\MizanCore\BaasSdk\Generated\Model\WebhookSubscriptionDestroy204Response**](../Model/WebhookSubscriptionDestroy204Response.md)

### Authorization

[tenantHeader](../../README.md#tenantHeader), [hmacAuth](../../README.md#hmacAuth), [apiKeyAuth](../../README.md#apiKeyAuth)

### HTTP request headers

- **Content-Type**: Not defined
- **Accept**: `application/json`

[[Back to top]](#) [[Back to API list]](../../README.md#endpoints)
[[Back to Model list]](../../README.md#models)
[[Back to README]](../../README.md)

## `webhookDeliveryLogRetry()`

```php
webhookDeliveryLogRetry($id, $x_tenant_id): \MizanCore\BaasSdk\Generated\Model\WebhookDeliveryLogRetry201Response
```

Retry a failed webhook delivery

Re-queues a failed webhook delivery for retry. Only failed deliveries can be retried.

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
$config = MizanCore\BaasSdk\Generated\Configuration::getDefaultConfiguration()->setApiKey('X-API-Key', 'YOUR_API_KEY');
// Uncomment below to setup prefix (e.g. Bearer) for API key, if needed
// $config = MizanCore\BaasSdk\Generated\Configuration::getDefaultConfiguration()->setApiKeyPrefix('X-API-Key', 'Bearer');


$apiInstance = new MizanCore\BaasSdk\Generated\Api\DeveloperPortalWebhookDeliveryLogsApi(
    // If you want use custom http client, pass your client which implements `GuzzleHttp\ClientInterface`.
    // This is optional, `GuzzleHttp\Client` will be used as default.
    new GuzzleHttp\Client(),
    $config
);
$id = 00000000-0000-0000-0000-000000000001; // string
$x_tenant_id = world.test.localhost; // string | Tenant identifier (UUID or domain, e.g. world.test.localhost). Required on every tenant-scoped route. Maps to the tenant whose database serves this request. In production, prefer Host-header-based resolution; X-Tenant-ID is intended for non-production environments and is rejected (HTTP 400) on production hosts.

try {
    $result = $apiInstance->webhookDeliveryLogRetry($id, $x_tenant_id);
    print_r($result);
} catch (Exception $e) {
    echo 'Exception when calling DeveloperPortalWebhookDeliveryLogsApi->webhookDeliveryLogRetry: ', $e->getMessage(), PHP_EOL;
}
```

### Parameters

| Name | Type | Description  | Notes |
| ------------- | ------------- | ------------- | ------------- |
| **id** | **string**|  | |
| **x_tenant_id** | **string**| Tenant identifier (UUID or domain, e.g. world.test.localhost). Required on every tenant-scoped route. Maps to the tenant whose database serves this request. In production, prefer Host-header-based resolution; X-Tenant-ID is intended for non-production environments and is rejected (HTTP 400) on production hosts. | |

### Return type

[**\MizanCore\BaasSdk\Generated\Model\WebhookDeliveryLogRetry201Response**](../Model/WebhookDeliveryLogRetry201Response.md)

### Authorization

[tenantHeader](../../README.md#tenantHeader), [hmacAuth](../../README.md#hmacAuth), [apiKeyAuth](../../README.md#apiKeyAuth)

### HTTP request headers

- **Content-Type**: Not defined
- **Accept**: `application/json`

[[Back to top]](#) [[Back to API list]](../../README.md#endpoints)
[[Back to Model list]](../../README.md#models)
[[Back to README]](../../README.md)
