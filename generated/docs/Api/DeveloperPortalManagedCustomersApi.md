# MizanCore\BaasSdk\Generated\DeveloperPortalManagedCustomersApi

All URIs are relative to https://api.mizancore.ng, except if the operation defines another base path.

| Method | HTTP request | Description |
| ------------- | ------------- | ------------- |
| [**developerCustomersIndex()**](DeveloperPortalManagedCustomersApi.md#developerCustomersIndex) | **GET** /api/v1/developer/customers | List managed customers |
| [**developerCustomersOffboard()**](DeveloperPortalManagedCustomersApi.md#developerCustomersOffboard) | **POST** /api/v1/developer/customers/{customerId}/offboard | Offboard a managed customer |
| [**developerCustomersReactivate()**](DeveloperPortalManagedCustomersApi.md#developerCustomersReactivate) | **POST** /api/v1/developer/customers/{customerId}/reactivate | Reactivate a managed customer |
| [**developerCustomersShow()**](DeveloperPortalManagedCustomersApi.md#developerCustomersShow) | **GET** /api/v1/developer/customers/{id} | Show a managed customer |
| [**developerCustomersStore()**](DeveloperPortalManagedCustomersApi.md#developerCustomersStore) | **POST** /api/v1/developer/customers | Onboard a managed customer |
| [**developerCustomersSuspend()**](DeveloperPortalManagedCustomersApi.md#developerCustomersSuspend) | **POST** /api/v1/developer/customers/{customerId}/suspend | Suspend a managed customer |
| [**managedCustomerIndex()**](DeveloperPortalManagedCustomersApi.md#managedCustomerIndex) | **GET** /api/v1/baas/customers | List managed customers |
| [**managedCustomerLifecycleOffboard()**](DeveloperPortalManagedCustomersApi.md#managedCustomerLifecycleOffboard) | **POST** /api/v1/baas/customers/{customerId}/offboard | Offboard a managed customer |
| [**managedCustomerLifecycleReactivate()**](DeveloperPortalManagedCustomersApi.md#managedCustomerLifecycleReactivate) | **POST** /api/v1/baas/customers/{customerId}/reactivate | Reactivate a managed customer |
| [**managedCustomerLifecycleSuspend()**](DeveloperPortalManagedCustomersApi.md#managedCustomerLifecycleSuspend) | **POST** /api/v1/baas/customers/{customerId}/suspend | Suspend a managed customer |
| [**managedCustomerShow()**](DeveloperPortalManagedCustomersApi.md#managedCustomerShow) | **GET** /api/v1/baas/customers/{id} | Show a managed customer |
| [**managedCustomerStore()**](DeveloperPortalManagedCustomersApi.md#managedCustomerStore) | **POST** /api/v1/baas/customers | Onboard a managed customer |


## `developerCustomersIndex()`

```php
developerCustomersIndex($x_tenant_id, $per_page): \MizanCore\BaasSdk\Generated\Model\VirtualAccountQueryIndex200Response
```

List managed customers

Returns the managed customers linked to the authenticated partner. BVN/NIN/phone are masked (PII). Empty for a licensed partner (no links).

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


$apiInstance = new MizanCore\BaasSdk\Generated\Api\DeveloperPortalManagedCustomersApi(
    // If you want use custom http client, pass your client which implements `GuzzleHttp\ClientInterface`.
    // This is optional, `GuzzleHttp\Client` will be used as default.
    new GuzzleHttp\Client(),
    $config
);
$x_tenant_id = world.test.localhost; // string | Tenant identifier (UUID or domain, e.g. world.test.localhost). Required on every tenant-scoped route. Maps to the tenant whose database serves this request. In production, prefer Host-header-based resolution; X-Tenant-ID is intended for non-production environments and is rejected (HTTP 400) on production hosts.
$per_page = 20; // int | Page size (1-100, default 20).

try {
    $result = $apiInstance->developerCustomersIndex($x_tenant_id, $per_page);
    print_r($result);
} catch (Exception $e) {
    echo 'Exception when calling DeveloperPortalManagedCustomersApi->developerCustomersIndex: ', $e->getMessage(), PHP_EOL;
}
```

### Parameters

| Name | Type | Description  | Notes |
| ------------- | ------------- | ------------- | ------------- |
| **x_tenant_id** | **string**| Tenant identifier (UUID or domain, e.g. world.test.localhost). Required on every tenant-scoped route. Maps to the tenant whose database serves this request. In production, prefer Host-header-based resolution; X-Tenant-ID is intended for non-production environments and is rejected (HTTP 400) on production hosts. | |
| **per_page** | **int**| Page size (1-100, default 20). | [optional] |

### Return type

[**\MizanCore\BaasSdk\Generated\Model\VirtualAccountQueryIndex200Response**](../Model/VirtualAccountQueryIndex200Response.md)

### Authorization

[tenantHeader](../../README.md#tenantHeader), [hmacAuth](../../README.md#hmacAuth), [apiKeyAuth](../../README.md#apiKeyAuth)

### HTTP request headers

- **Content-Type**: Not defined
- **Accept**: `application/json`

[[Back to top]](#) [[Back to API list]](../../README.md#endpoints)
[[Back to Model list]](../../README.md#models)
[[Back to README]](../../README.md)

## `developerCustomersOffboard()`

```php
developerCustomersOffboard($customer_id, $x_tenant_id, $managed_customer_lifecycle_request): \MizanCore\BaasSdk\Generated\Model\VirtualAccountQueryIndex200Response
```

Offboard a managed customer

Severs the partner relationship with a managed customer (active|suspended → offboarded, terminal). Revokes the partner active consents (NDPA lawful-basis withdrawal) and ends all access. The shared customer identity is NOT deleted (other partners + MFB bank-of-record). Managed partners only. Owner/admin/developer only.

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


$apiInstance = new MizanCore\BaasSdk\Generated\Api\DeveloperPortalManagedCustomersApi(
    // If you want use custom http client, pass your client which implements `GuzzleHttp\ClientInterface`.
    // This is optional, `GuzzleHttp\Client` will be used as default.
    new GuzzleHttp\Client(),
    $config
);
$customer_id = 00000000-0000-0000-0000-000000000001; // string
$x_tenant_id = world.test.localhost; // string | Tenant identifier (UUID or domain, e.g. world.test.localhost). Required on every tenant-scoped route. Maps to the tenant whose database serves this request. In production, prefer Host-header-based resolution; X-Tenant-ID is intended for non-production environments and is rejected (HTTP 400) on production hosts.
$managed_customer_lifecycle_request = {"reason":"example"}; // \MizanCore\BaasSdk\Generated\Model\ManagedCustomerLifecycleRequest

try {
    $result = $apiInstance->developerCustomersOffboard($customer_id, $x_tenant_id, $managed_customer_lifecycle_request);
    print_r($result);
} catch (Exception $e) {
    echo 'Exception when calling DeveloperPortalManagedCustomersApi->developerCustomersOffboard: ', $e->getMessage(), PHP_EOL;
}
```

### Parameters

| Name | Type | Description  | Notes |
| ------------- | ------------- | ------------- | ------------- |
| **customer_id** | **string**|  | |
| **x_tenant_id** | **string**| Tenant identifier (UUID or domain, e.g. world.test.localhost). Required on every tenant-scoped route. Maps to the tenant whose database serves this request. In production, prefer Host-header-based resolution; X-Tenant-ID is intended for non-production environments and is rejected (HTTP 400) on production hosts. | |
| **managed_customer_lifecycle_request** | [**\MizanCore\BaasSdk\Generated\Model\ManagedCustomerLifecycleRequest**](../Model/ManagedCustomerLifecycleRequest.md)|  | |

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

## `developerCustomersReactivate()`

```php
developerCustomersReactivate($customer_id, $x_tenant_id, $managed_customer_lifecycle_request): \MizanCore\BaasSdk\Generated\Model\VirtualAccountQueryIndex200Response
```

Reactivate a managed customer

Restores a suspended partner relationship (suspended → active). Only a suspended relationship may be reactivated; offboarded is terminal. Managed partners only. Owner/admin/developer only.

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


$apiInstance = new MizanCore\BaasSdk\Generated\Api\DeveloperPortalManagedCustomersApi(
    // If you want use custom http client, pass your client which implements `GuzzleHttp\ClientInterface`.
    // This is optional, `GuzzleHttp\Client` will be used as default.
    new GuzzleHttp\Client(),
    $config
);
$customer_id = 00000000-0000-0000-0000-000000000001; // string
$x_tenant_id = world.test.localhost; // string | Tenant identifier (UUID or domain, e.g. world.test.localhost). Required on every tenant-scoped route. Maps to the tenant whose database serves this request. In production, prefer Host-header-based resolution; X-Tenant-ID is intended for non-production environments and is rejected (HTTP 400) on production hosts.
$managed_customer_lifecycle_request = {"reason":"example"}; // \MizanCore\BaasSdk\Generated\Model\ManagedCustomerLifecycleRequest

try {
    $result = $apiInstance->developerCustomersReactivate($customer_id, $x_tenant_id, $managed_customer_lifecycle_request);
    print_r($result);
} catch (Exception $e) {
    echo 'Exception when calling DeveloperPortalManagedCustomersApi->developerCustomersReactivate: ', $e->getMessage(), PHP_EOL;
}
```

### Parameters

| Name | Type | Description  | Notes |
| ------------- | ------------- | ------------- | ------------- |
| **customer_id** | **string**|  | |
| **x_tenant_id** | **string**| Tenant identifier (UUID or domain, e.g. world.test.localhost). Required on every tenant-scoped route. Maps to the tenant whose database serves this request. In production, prefer Host-header-based resolution; X-Tenant-ID is intended for non-production environments and is rejected (HTTP 400) on production hosts. | |
| **managed_customer_lifecycle_request** | [**\MizanCore\BaasSdk\Generated\Model\ManagedCustomerLifecycleRequest**](../Model/ManagedCustomerLifecycleRequest.md)|  | |

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

## `developerCustomersShow()`

```php
developerCustomersShow($id, $x_tenant_id): \MizanCore\BaasSdk\Generated\Model\VirtualAccountQueryIndex200Response
```

Show a managed customer

Returns a single managed customer linked to the authenticated partner. BOLA: a customer this partner has no link to resolves to 404, never 200. ACTIVE link: a managed partner additionally needs a granted, unexpired ACCOUNT_DETAILS consent for the PII block (403 BAAS_CONSENT_REQUIRED otherwise). NON-ACTIVE link (suspended/offboarded): the partner-owned relationship metadata is always readable (200, status reflects the lifecycle state) but the customer PII block is masked (customer:null, pii_access:false) — NDPA data-minimisation — so the partner can still view and reactivate the relationship.

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


$apiInstance = new MizanCore\BaasSdk\Generated\Api\DeveloperPortalManagedCustomersApi(
    // If you want use custom http client, pass your client which implements `GuzzleHttp\ClientInterface`.
    // This is optional, `GuzzleHttp\Client` will be used as default.
    new GuzzleHttp\Client(),
    $config
);
$id = 00000000-0000-0000-0000-000000000001; // string
$x_tenant_id = world.test.localhost; // string | Tenant identifier (UUID or domain, e.g. world.test.localhost). Required on every tenant-scoped route. Maps to the tenant whose database serves this request. In production, prefer Host-header-based resolution; X-Tenant-ID is intended for non-production environments and is rejected (HTTP 400) on production hosts.

try {
    $result = $apiInstance->developerCustomersShow($id, $x_tenant_id);
    print_r($result);
} catch (Exception $e) {
    echo 'Exception when calling DeveloperPortalManagedCustomersApi->developerCustomersShow: ', $e->getMessage(), PHP_EOL;
}
```

### Parameters

| Name | Type | Description  | Notes |
| ------------- | ------------- | ------------- | ------------- |
| **id** | **string**|  | |
| **x_tenant_id** | **string**| Tenant identifier (UUID or domain, e.g. world.test.localhost). Required on every tenant-scoped route. Maps to the tenant whose database serves this request. In production, prefer Host-header-based resolution; X-Tenant-ID is intended for non-production environments and is rejected (HTTP 400) on production hosts. | |

### Return type

[**\MizanCore\BaasSdk\Generated\Model\VirtualAccountQueryIndex200Response**](../Model/VirtualAccountQueryIndex200Response.md)

### Authorization

[tenantHeader](../../README.md#tenantHeader), [hmacAuth](../../README.md#hmacAuth), [apiKeyAuth](../../README.md#apiKeyAuth)

### HTTP request headers

- **Content-Type**: Not defined
- **Accept**: `application/json`

[[Back to top]](#) [[Back to API list]](../../README.md#endpoints)
[[Back to Model list]](../../README.md#models)
[[Back to README]](../../README.md)

## `developerCustomersStore()`

```php
developerCustomersStore($x_tenant_id, $onboard_managed_customer_request): \MizanCore\BaasSdk\Generated\Model\VirtualAccountQueryIndex200Response
```

Onboard a managed customer

Onboards an MFB-owned end-customer under the partner (find-or-link by BVN — an existing identity is reused with no re-KYC). Managed partners only. Owner/admin/developer only. Idempotent per (partner, BVN).

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


$apiInstance = new MizanCore\BaasSdk\Generated\Api\DeveloperPortalManagedCustomersApi(
    // If you want use custom http client, pass your client which implements `GuzzleHttp\ClientInterface`.
    // This is optional, `GuzzleHttp\Client` will be used as default.
    new GuzzleHttp\Client(),
    $config
);
$x_tenant_id = world.test.localhost; // string | Tenant identifier (UUID or domain, e.g. world.test.localhost). Required on every tenant-scoped route. Maps to the tenant whose database serves this request. In production, prefer Host-header-based resolution; X-Tenant-ID is intended for non-production environments and is rejected (HTTP 400) on production hosts.
$onboard_managed_customer_request = {"bvn":"12345678901","nin":"12345678901","first_name":"example","last_name":"example","phone":"+2348012345678","email":"alice@world.test","date_of_birth":"2026-04-21","gender":"male","address":"example","tier":1,"customer_reference":"example"}; // \MizanCore\BaasSdk\Generated\Model\OnboardManagedCustomerRequest

try {
    $result = $apiInstance->developerCustomersStore($x_tenant_id, $onboard_managed_customer_request);
    print_r($result);
} catch (Exception $e) {
    echo 'Exception when calling DeveloperPortalManagedCustomersApi->developerCustomersStore: ', $e->getMessage(), PHP_EOL;
}
```

### Parameters

| Name | Type | Description  | Notes |
| ------------- | ------------- | ------------- | ------------- |
| **x_tenant_id** | **string**| Tenant identifier (UUID or domain, e.g. world.test.localhost). Required on every tenant-scoped route. Maps to the tenant whose database serves this request. In production, prefer Host-header-based resolution; X-Tenant-ID is intended for non-production environments and is rejected (HTTP 400) on production hosts. | |
| **onboard_managed_customer_request** | [**\MizanCore\BaasSdk\Generated\Model\OnboardManagedCustomerRequest**](../Model/OnboardManagedCustomerRequest.md)|  | |

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

## `developerCustomersSuspend()`

```php
developerCustomersSuspend($customer_id, $x_tenant_id, $managed_customer_lifecycle_request): \MizanCore\BaasSdk\Generated\Model\VirtualAccountQueryIndex200Response
```

Suspend a managed customer

Freezes the partner relationship with a managed customer (active → suspended). The partner can no longer act on the customer (subsequent access 404s) until reactivated. Managed partners only. Owner/admin/developer only.

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


$apiInstance = new MizanCore\BaasSdk\Generated\Api\DeveloperPortalManagedCustomersApi(
    // If you want use custom http client, pass your client which implements `GuzzleHttp\ClientInterface`.
    // This is optional, `GuzzleHttp\Client` will be used as default.
    new GuzzleHttp\Client(),
    $config
);
$customer_id = 00000000-0000-0000-0000-000000000001; // string
$x_tenant_id = world.test.localhost; // string | Tenant identifier (UUID or domain, e.g. world.test.localhost). Required on every tenant-scoped route. Maps to the tenant whose database serves this request. In production, prefer Host-header-based resolution; X-Tenant-ID is intended for non-production environments and is rejected (HTTP 400) on production hosts.
$managed_customer_lifecycle_request = {"reason":"example"}; // \MizanCore\BaasSdk\Generated\Model\ManagedCustomerLifecycleRequest

try {
    $result = $apiInstance->developerCustomersSuspend($customer_id, $x_tenant_id, $managed_customer_lifecycle_request);
    print_r($result);
} catch (Exception $e) {
    echo 'Exception when calling DeveloperPortalManagedCustomersApi->developerCustomersSuspend: ', $e->getMessage(), PHP_EOL;
}
```

### Parameters

| Name | Type | Description  | Notes |
| ------------- | ------------- | ------------- | ------------- |
| **customer_id** | **string**|  | |
| **x_tenant_id** | **string**| Tenant identifier (UUID or domain, e.g. world.test.localhost). Required on every tenant-scoped route. Maps to the tenant whose database serves this request. In production, prefer Host-header-based resolution; X-Tenant-ID is intended for non-production environments and is rejected (HTTP 400) on production hosts. | |
| **managed_customer_lifecycle_request** | [**\MizanCore\BaasSdk\Generated\Model\ManagedCustomerLifecycleRequest**](../Model/ManagedCustomerLifecycleRequest.md)|  | |

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

## `managedCustomerIndex()`

```php
managedCustomerIndex($x_tenant_id, $per_page): \MizanCore\BaasSdk\Generated\Model\VirtualAccountQueryIndex200Response
```

List managed customers

Returns the managed customers linked to the authenticated partner. BVN/NIN/phone are masked (PII). Empty for a licensed partner (no links).

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


$apiInstance = new MizanCore\BaasSdk\Generated\Api\DeveloperPortalManagedCustomersApi(
    // If you want use custom http client, pass your client which implements `GuzzleHttp\ClientInterface`.
    // This is optional, `GuzzleHttp\Client` will be used as default.
    new GuzzleHttp\Client(),
    $config
);
$x_tenant_id = world.test.localhost; // string | Tenant identifier (UUID or domain, e.g. world.test.localhost). Required on every tenant-scoped route. Maps to the tenant whose database serves this request. In production, prefer Host-header-based resolution; X-Tenant-ID is intended for non-production environments and is rejected (HTTP 400) on production hosts.
$per_page = 20; // int | Page size (1-100, default 20).

try {
    $result = $apiInstance->managedCustomerIndex($x_tenant_id, $per_page);
    print_r($result);
} catch (Exception $e) {
    echo 'Exception when calling DeveloperPortalManagedCustomersApi->managedCustomerIndex: ', $e->getMessage(), PHP_EOL;
}
```

### Parameters

| Name | Type | Description  | Notes |
| ------------- | ------------- | ------------- | ------------- |
| **x_tenant_id** | **string**| Tenant identifier (UUID or domain, e.g. world.test.localhost). Required on every tenant-scoped route. Maps to the tenant whose database serves this request. In production, prefer Host-header-based resolution; X-Tenant-ID is intended for non-production environments and is rejected (HTTP 400) on production hosts. | |
| **per_page** | **int**| Page size (1-100, default 20). | [optional] |

### Return type

[**\MizanCore\BaasSdk\Generated\Model\VirtualAccountQueryIndex200Response**](../Model/VirtualAccountQueryIndex200Response.md)

### Authorization

[tenantHeader](../../README.md#tenantHeader), [hmacAuth](../../README.md#hmacAuth), [apiKeyAuth](../../README.md#apiKeyAuth)

### HTTP request headers

- **Content-Type**: Not defined
- **Accept**: `application/json`

[[Back to top]](#) [[Back to API list]](../../README.md#endpoints)
[[Back to Model list]](../../README.md#models)
[[Back to README]](../../README.md)

## `managedCustomerLifecycleOffboard()`

```php
managedCustomerLifecycleOffboard($customer_id, $x_tenant_id, $idempotency_key, $managed_customer_lifecycle_request): \MizanCore\BaasSdk\Generated\Model\VirtualAccountQueryIndex200Response
```

Offboard a managed customer

Severs the partner relationship with a managed customer (active|suspended → offboarded, terminal). Revokes the partner active consents (NDPA lawful-basis withdrawal) and ends all access. The shared customer identity is NOT deleted (other partners + MFB bank-of-record). Managed partners only. Owner/admin/developer only.

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


$apiInstance = new MizanCore\BaasSdk\Generated\Api\DeveloperPortalManagedCustomersApi(
    // If you want use custom http client, pass your client which implements `GuzzleHttp\ClientInterface`.
    // This is optional, `GuzzleHttp\Client` will be used as default.
    new GuzzleHttp\Client(),
    $config
);
$customer_id = 00000000-0000-0000-0000-000000000001; // string
$x_tenant_id = world.test.localhost; // string | Tenant identifier (UUID or domain, e.g. world.test.localhost). Required on every tenant-scoped route. Maps to the tenant whose database serves this request. In production, prefer Host-header-based resolution; X-Tenant-ID is intended for non-production environments and is rejected (HTTP 400) on production hosts.
$idempotency_key = 'idempotency_key_example'; // string | Unique client-generated key (UUID recommended) for idempotent retry semantics. Duplicate requests return the cached response with header Idempotency-Replayed: true.
$managed_customer_lifecycle_request = {"reason":"CI18 offboard"}; // \MizanCore\BaasSdk\Generated\Model\ManagedCustomerLifecycleRequest

try {
    $result = $apiInstance->managedCustomerLifecycleOffboard($customer_id, $x_tenant_id, $idempotency_key, $managed_customer_lifecycle_request);
    print_r($result);
} catch (Exception $e) {
    echo 'Exception when calling DeveloperPortalManagedCustomersApi->managedCustomerLifecycleOffboard: ', $e->getMessage(), PHP_EOL;
}
```

### Parameters

| Name | Type | Description  | Notes |
| ------------- | ------------- | ------------- | ------------- |
| **customer_id** | **string**|  | |
| **x_tenant_id** | **string**| Tenant identifier (UUID or domain, e.g. world.test.localhost). Required on every tenant-scoped route. Maps to the tenant whose database serves this request. In production, prefer Host-header-based resolution; X-Tenant-ID is intended for non-production environments and is rejected (HTTP 400) on production hosts. | |
| **idempotency_key** | **string**| Unique client-generated key (UUID recommended) for idempotent retry semantics. Duplicate requests return the cached response with header Idempotency-Replayed: true. | |
| **managed_customer_lifecycle_request** | [**\MizanCore\BaasSdk\Generated\Model\ManagedCustomerLifecycleRequest**](../Model/ManagedCustomerLifecycleRequest.md)|  | |

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

## `managedCustomerLifecycleReactivate()`

```php
managedCustomerLifecycleReactivate($customer_id, $x_tenant_id, $idempotency_key, $managed_customer_lifecycle_request): \MizanCore\BaasSdk\Generated\Model\VirtualAccountQueryIndex200Response
```

Reactivate a managed customer

Restores a suspended partner relationship (suspended → active). Only a suspended relationship may be reactivated; offboarded is terminal. Managed partners only. Owner/admin/developer only.

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


$apiInstance = new MizanCore\BaasSdk\Generated\Api\DeveloperPortalManagedCustomersApi(
    // If you want use custom http client, pass your client which implements `GuzzleHttp\ClientInterface`.
    // This is optional, `GuzzleHttp\Client` will be used as default.
    new GuzzleHttp\Client(),
    $config
);
$customer_id = 00000000-0000-0000-0000-000000000001; // string
$x_tenant_id = world.test.localhost; // string | Tenant identifier (UUID or domain, e.g. world.test.localhost). Required on every tenant-scoped route. Maps to the tenant whose database serves this request. In production, prefer Host-header-based resolution; X-Tenant-ID is intended for non-production environments and is rejected (HTTP 400) on production hosts.
$idempotency_key = 'idempotency_key_example'; // string | Unique client-generated key (UUID recommended) for idempotent retry semantics. Duplicate requests return the cached response with header Idempotency-Replayed: true.
$managed_customer_lifecycle_request = {"reason":"example"}; // \MizanCore\BaasSdk\Generated\Model\ManagedCustomerLifecycleRequest

try {
    $result = $apiInstance->managedCustomerLifecycleReactivate($customer_id, $x_tenant_id, $idempotency_key, $managed_customer_lifecycle_request);
    print_r($result);
} catch (Exception $e) {
    echo 'Exception when calling DeveloperPortalManagedCustomersApi->managedCustomerLifecycleReactivate: ', $e->getMessage(), PHP_EOL;
}
```

### Parameters

| Name | Type | Description  | Notes |
| ------------- | ------------- | ------------- | ------------- |
| **customer_id** | **string**|  | |
| **x_tenant_id** | **string**| Tenant identifier (UUID or domain, e.g. world.test.localhost). Required on every tenant-scoped route. Maps to the tenant whose database serves this request. In production, prefer Host-header-based resolution; X-Tenant-ID is intended for non-production environments and is rejected (HTTP 400) on production hosts. | |
| **idempotency_key** | **string**| Unique client-generated key (UUID recommended) for idempotent retry semantics. Duplicate requests return the cached response with header Idempotency-Replayed: true. | |
| **managed_customer_lifecycle_request** | [**\MizanCore\BaasSdk\Generated\Model\ManagedCustomerLifecycleRequest**](../Model/ManagedCustomerLifecycleRequest.md)|  | |

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

## `managedCustomerLifecycleSuspend()`

```php
managedCustomerLifecycleSuspend($customer_id, $x_tenant_id, $idempotency_key, $managed_customer_lifecycle_request): \MizanCore\BaasSdk\Generated\Model\VirtualAccountQueryIndex200Response
```

Suspend a managed customer

Freezes the partner relationship with a managed customer (active → suspended). The partner can no longer act on the customer (subsequent access 404s) until reactivated. Managed partners only. Owner/admin/developer only.

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


$apiInstance = new MizanCore\BaasSdk\Generated\Api\DeveloperPortalManagedCustomersApi(
    // If you want use custom http client, pass your client which implements `GuzzleHttp\ClientInterface`.
    // This is optional, `GuzzleHttp\Client` will be used as default.
    new GuzzleHttp\Client(),
    $config
);
$customer_id = 00000000-0000-0000-0000-000000000001; // string
$x_tenant_id = world.test.localhost; // string | Tenant identifier (UUID or domain, e.g. world.test.localhost). Required on every tenant-scoped route. Maps to the tenant whose database serves this request. In production, prefer Host-header-based resolution; X-Tenant-ID is intended for non-production environments and is rejected (HTTP 400) on production hosts.
$idempotency_key = 'idempotency_key_example'; // string | Unique client-generated key (UUID recommended) for idempotent retry semantics. Duplicate requests return the cached response with header Idempotency-Replayed: true.
$managed_customer_lifecycle_request = {"reason":"CI18 lifecycle test"}; // \MizanCore\BaasSdk\Generated\Model\ManagedCustomerLifecycleRequest

try {
    $result = $apiInstance->managedCustomerLifecycleSuspend($customer_id, $x_tenant_id, $idempotency_key, $managed_customer_lifecycle_request);
    print_r($result);
} catch (Exception $e) {
    echo 'Exception when calling DeveloperPortalManagedCustomersApi->managedCustomerLifecycleSuspend: ', $e->getMessage(), PHP_EOL;
}
```

### Parameters

| Name | Type | Description  | Notes |
| ------------- | ------------- | ------------- | ------------- |
| **customer_id** | **string**|  | |
| **x_tenant_id** | **string**| Tenant identifier (UUID or domain, e.g. world.test.localhost). Required on every tenant-scoped route. Maps to the tenant whose database serves this request. In production, prefer Host-header-based resolution; X-Tenant-ID is intended for non-production environments and is rejected (HTTP 400) on production hosts. | |
| **idempotency_key** | **string**| Unique client-generated key (UUID recommended) for idempotent retry semantics. Duplicate requests return the cached response with header Idempotency-Replayed: true. | |
| **managed_customer_lifecycle_request** | [**\MizanCore\BaasSdk\Generated\Model\ManagedCustomerLifecycleRequest**](../Model/ManagedCustomerLifecycleRequest.md)|  | |

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

## `managedCustomerShow()`

```php
managedCustomerShow($id, $x_tenant_id): \MizanCore\BaasSdk\Generated\Model\VirtualAccountQueryIndex200Response
```

Show a managed customer

Returns a single managed customer linked to the authenticated partner. BOLA: a customer this partner has no link to resolves to 404, never 200. ACTIVE link: a managed partner additionally needs a granted, unexpired ACCOUNT_DETAILS consent for the PII block (403 BAAS_CONSENT_REQUIRED otherwise). NON-ACTIVE link (suspended/offboarded): the partner-owned relationship metadata is always readable (200, status reflects the lifecycle state) but the customer PII block is masked (customer:null, pii_access:false) — NDPA data-minimisation — so the partner can still view and reactivate the relationship.

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


$apiInstance = new MizanCore\BaasSdk\Generated\Api\DeveloperPortalManagedCustomersApi(
    // If you want use custom http client, pass your client which implements `GuzzleHttp\ClientInterface`.
    // This is optional, `GuzzleHttp\Client` will be used as default.
    new GuzzleHttp\Client(),
    $config
);
$id = 00000000-0000-0000-0000-000000000001; // string
$x_tenant_id = world.test.localhost; // string | Tenant identifier (UUID or domain, e.g. world.test.localhost). Required on every tenant-scoped route. Maps to the tenant whose database serves this request. In production, prefer Host-header-based resolution; X-Tenant-ID is intended for non-production environments and is rejected (HTTP 400) on production hosts.

try {
    $result = $apiInstance->managedCustomerShow($id, $x_tenant_id);
    print_r($result);
} catch (Exception $e) {
    echo 'Exception when calling DeveloperPortalManagedCustomersApi->managedCustomerShow: ', $e->getMessage(), PHP_EOL;
}
```

### Parameters

| Name | Type | Description  | Notes |
| ------------- | ------------- | ------------- | ------------- |
| **id** | **string**|  | |
| **x_tenant_id** | **string**| Tenant identifier (UUID or domain, e.g. world.test.localhost). Required on every tenant-scoped route. Maps to the tenant whose database serves this request. In production, prefer Host-header-based resolution; X-Tenant-ID is intended for non-production environments and is rejected (HTTP 400) on production hosts. | |

### Return type

[**\MizanCore\BaasSdk\Generated\Model\VirtualAccountQueryIndex200Response**](../Model/VirtualAccountQueryIndex200Response.md)

### Authorization

[tenantHeader](../../README.md#tenantHeader), [hmacAuth](../../README.md#hmacAuth), [apiKeyAuth](../../README.md#apiKeyAuth)

### HTTP request headers

- **Content-Type**: Not defined
- **Accept**: `application/json`

[[Back to top]](#) [[Back to API list]](../../README.md#endpoints)
[[Back to Model list]](../../README.md#models)
[[Back to README]](../../README.md)

## `managedCustomerStore()`

```php
managedCustomerStore($x_tenant_id, $idempotency_key, $onboard_managed_customer_request): \MizanCore\BaasSdk\Generated\Model\VirtualAccountQueryIndex200Response
```

Onboard a managed customer

Onboards an MFB-owned end-customer under the partner (find-or-link by BVN — an existing identity is reused with no re-KYC). Managed partners only. Owner/admin/developer only. Idempotent per (partner, BVN).

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


$apiInstance = new MizanCore\BaasSdk\Generated\Api\DeveloperPortalManagedCustomersApi(
    // If you want use custom http client, pass your client which implements `GuzzleHttp\ClientInterface`.
    // This is optional, `GuzzleHttp\Client` will be used as default.
    new GuzzleHttp\Client(),
    $config
);
$x_tenant_id = world.test.localhost; // string | Tenant identifier (UUID or domain, e.g. world.test.localhost). Required on every tenant-scoped route. Maps to the tenant whose database serves this request. In production, prefer Host-header-based resolution; X-Tenant-ID is intended for non-production environments and is rejected (HTTP 400) on production hosts.
$idempotency_key = 'idempotency_key_example'; // string | Unique client-generated key (UUID recommended) for idempotent retry semantics. Duplicate requests return the cached response with header Idempotency-Replayed: true.
$onboard_managed_customer_request = {"bvn":"22281800001","first_name":"Ngozi","last_name":"Eze","phone":"08031800001","date_of_birth":"1991-03-12","tier":1,"customer_reference":"ci18-user-001"}; // \MizanCore\BaasSdk\Generated\Model\OnboardManagedCustomerRequest

try {
    $result = $apiInstance->managedCustomerStore($x_tenant_id, $idempotency_key, $onboard_managed_customer_request);
    print_r($result);
} catch (Exception $e) {
    echo 'Exception when calling DeveloperPortalManagedCustomersApi->managedCustomerStore: ', $e->getMessage(), PHP_EOL;
}
```

### Parameters

| Name | Type | Description  | Notes |
| ------------- | ------------- | ------------- | ------------- |
| **x_tenant_id** | **string**| Tenant identifier (UUID or domain, e.g. world.test.localhost). Required on every tenant-scoped route. Maps to the tenant whose database serves this request. In production, prefer Host-header-based resolution; X-Tenant-ID is intended for non-production environments and is rejected (HTTP 400) on production hosts. | |
| **idempotency_key** | **string**| Unique client-generated key (UUID recommended) for idempotent retry semantics. Duplicate requests return the cached response with header Idempotency-Replayed: true. | |
| **onboard_managed_customer_request** | [**\MizanCore\BaasSdk\Generated\Model\OnboardManagedCustomerRequest**](../Model/OnboardManagedCustomerRequest.md)|  | |

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
