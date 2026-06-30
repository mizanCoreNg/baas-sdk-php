# MizanCore\BaasSdk\Generated\BaaSFeesApi

All URIs are relative to https://api.mizancore.ng, except if the operation defines another base path.

| Method | HTTP request | Description |
| ------------- | ------------- | ------------- |
| [**developerFeesIndex()**](BaaSFeesApi.md#developerFeesIndex) | **GET** /api/v1/developer/fees | Get partner fee schedule |
| [**partnerFeeScheduleIndex()**](BaaSFeesApi.md#partnerFeeScheduleIndex) | **GET** /api/v1/baas/fees | Get partner fee schedule |


## `developerFeesIndex()`

```php
developerFeesIndex($x_tenant_id): \MizanCore\BaasSdk\Generated\Model\PartnerFeeScheduleIndex200Response
```

Get partner fee schedule

Returns the calling partner's configured fee schedule — the cost the partner bears for each fee type (flat / percentage / tiered, with any min/max cap). Internal platform/MFB revenue-split fields are deliberately omitted. Fee types with no configured charge are returned as a zero \"no charge\" line so the price list is complete.

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


$apiInstance = new MizanCore\BaasSdk\Generated\Api\BaaSFeesApi(
    // If you want use custom http client, pass your client which implements `GuzzleHttp\ClientInterface`.
    // This is optional, `GuzzleHttp\Client` will be used as default.
    new GuzzleHttp\Client(),
    $config
);
$x_tenant_id = world.test.localhost; // string | Tenant identifier (UUID or domain, e.g. world.test.localhost). Required on every tenant-scoped route. Maps to the tenant whose database serves this request. In production, prefer Host-header-based resolution; X-Tenant-ID is intended for non-production environments and is rejected (HTTP 400) on production hosts.

try {
    $result = $apiInstance->developerFeesIndex($x_tenant_id);
    print_r($result);
} catch (Exception $e) {
    echo 'Exception when calling BaaSFeesApi->developerFeesIndex: ', $e->getMessage(), PHP_EOL;
}
```

### Parameters

| Name | Type | Description  | Notes |
| ------------- | ------------- | ------------- | ------------- |
| **x_tenant_id** | **string**| Tenant identifier (UUID or domain, e.g. world.test.localhost). Required on every tenant-scoped route. Maps to the tenant whose database serves this request. In production, prefer Host-header-based resolution; X-Tenant-ID is intended for non-production environments and is rejected (HTTP 400) on production hosts. | |

### Return type

[**\MizanCore\BaasSdk\Generated\Model\PartnerFeeScheduleIndex200Response**](../Model/PartnerFeeScheduleIndex200Response.md)

### Authorization

[tenantHeader](../../README.md#tenantHeader), [hmacAuth](../../README.md#hmacAuth), [apiKeyAuth](../../README.md#apiKeyAuth)

### HTTP request headers

- **Content-Type**: Not defined
- **Accept**: `application/json`

[[Back to top]](#) [[Back to API list]](../../README.md#endpoints)
[[Back to Model list]](../../README.md#models)
[[Back to README]](../../README.md)

## `partnerFeeScheduleIndex()`

```php
partnerFeeScheduleIndex($x_tenant_id): \MizanCore\BaasSdk\Generated\Model\PartnerFeeScheduleIndex200Response
```

Get partner fee schedule

Returns the calling partner's configured fee schedule — the cost the partner bears for each fee type (flat / percentage / tiered, with any min/max cap). Internal platform/MFB revenue-split fields are deliberately omitted. Fee types with no configured charge are returned as a zero \"no charge\" line so the price list is complete.

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


$apiInstance = new MizanCore\BaasSdk\Generated\Api\BaaSFeesApi(
    // If you want use custom http client, pass your client which implements `GuzzleHttp\ClientInterface`.
    // This is optional, `GuzzleHttp\Client` will be used as default.
    new GuzzleHttp\Client(),
    $config
);
$x_tenant_id = world.test.localhost; // string | Tenant identifier (UUID or domain, e.g. world.test.localhost). Required on every tenant-scoped route. Maps to the tenant whose database serves this request. In production, prefer Host-header-based resolution; X-Tenant-ID is intended for non-production environments and is rejected (HTTP 400) on production hosts.

try {
    $result = $apiInstance->partnerFeeScheduleIndex($x_tenant_id);
    print_r($result);
} catch (Exception $e) {
    echo 'Exception when calling BaaSFeesApi->partnerFeeScheduleIndex: ', $e->getMessage(), PHP_EOL;
}
```

### Parameters

| Name | Type | Description  | Notes |
| ------------- | ------------- | ------------- | ------------- |
| **x_tenant_id** | **string**| Tenant identifier (UUID or domain, e.g. world.test.localhost). Required on every tenant-scoped route. Maps to the tenant whose database serves this request. In production, prefer Host-header-based resolution; X-Tenant-ID is intended for non-production environments and is rejected (HTTP 400) on production hosts. | |

### Return type

[**\MizanCore\BaasSdk\Generated\Model\PartnerFeeScheduleIndex200Response**](../Model/PartnerFeeScheduleIndex200Response.md)

### Authorization

[tenantHeader](../../README.md#tenantHeader), [hmacAuth](../../README.md#hmacAuth), [apiKeyAuth](../../README.md#apiKeyAuth)

### HTTP request headers

- **Content-Type**: Not defined
- **Accept**: `application/json`

[[Back to top]](#) [[Back to API list]](../../README.md#endpoints)
[[Back to Model list]](../../README.md#models)
[[Back to README]](../../README.md)
