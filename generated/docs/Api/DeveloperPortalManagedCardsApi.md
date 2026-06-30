# MizanCore\BaasSdk\Generated\DeveloperPortalManagedCardsApi

All URIs are relative to https://api.mizancore.ng, except if the operation defines another base path.

| Method | HTTP request | Description |
| ------------- | ------------- | ------------- |
| [**developerCustomersAccountsCardsFreeze()**](DeveloperPortalManagedCardsApi.md#developerCustomersAccountsCardsFreeze) | **POST** /api/v1/developer/customers/{customerId}/accounts/{accountId}/cards/{cardId}/freeze | Freeze a managed card |
| [**developerCustomersAccountsCardsIndex()**](DeveloperPortalManagedCardsApi.md#developerCustomersAccountsCardsIndex) | **GET** /api/v1/developer/customers/{customerId}/accounts/{accountId}/cards | List managed cards for an account |
| [**developerCustomersAccountsCardsIssue()**](DeveloperPortalManagedCardsApi.md#developerCustomersAccountsCardsIssue) | **POST** /api/v1/developer/customers/{customerId}/accounts/{accountId}/cards | Issue a managed virtual card |
| [**developerCustomersAccountsCardsLimits()**](DeveloperPortalManagedCardsApi.md#developerCustomersAccountsCardsLimits) | **PUT** /api/v1/developer/customers/{customerId}/accounts/{accountId}/cards/{cardId}/limits | Set managed card spending limits |
| [**developerCustomersAccountsCardsPin()**](DeveloperPortalManagedCardsApi.md#developerCustomersAccountsCardsPin) | **POST** /api/v1/developer/customers/{customerId}/accounts/{accountId}/cards/{cardId}/pin | Set or change a managed card PIN |
| [**developerCustomersAccountsCardsShow()**](DeveloperPortalManagedCardsApi.md#developerCustomersAccountsCardsShow) | **GET** /api/v1/developer/customers/{customerId}/accounts/{accountId}/cards/{cardId} | Show a managed card |
| [**developerCustomersAccountsCardsTerminate()**](DeveloperPortalManagedCardsApi.md#developerCustomersAccountsCardsTerminate) | **POST** /api/v1/developer/customers/{customerId}/accounts/{accountId}/cards/{cardId}/terminate | Terminate a managed card |
| [**developerCustomersAccountsCardsTransactions()**](DeveloperPortalManagedCardsApi.md#developerCustomersAccountsCardsTransactions) | **GET** /api/v1/developer/customers/{customerId}/accounts/{accountId}/cards/{cardId}/transactions | List managed card transactions |
| [**developerCustomersAccountsCardsUnfreeze()**](DeveloperPortalManagedCardsApi.md#developerCustomersAccountsCardsUnfreeze) | **POST** /api/v1/developer/customers/{customerId}/accounts/{accountId}/cards/{cardId}/unfreeze | Unfreeze a managed card |
| [**managedCardIssue()**](DeveloperPortalManagedCardsApi.md#managedCardIssue) | **POST** /api/v1/baas/customers/{customerId}/accounts/{accountId}/cards | Issue a managed virtual card |
| [**managedCardLifecycleFreeze()**](DeveloperPortalManagedCardsApi.md#managedCardLifecycleFreeze) | **POST** /api/v1/baas/customers/{customerId}/accounts/{accountId}/cards/{cardId}/freeze | Freeze a managed card |
| [**managedCardLifecycleSetLimits()**](DeveloperPortalManagedCardsApi.md#managedCardLifecycleSetLimits) | **PUT** /api/v1/baas/customers/{customerId}/accounts/{accountId}/cards/{cardId}/limits | Set managed card spending limits |
| [**managedCardLifecycleSetPin()**](DeveloperPortalManagedCardsApi.md#managedCardLifecycleSetPin) | **POST** /api/v1/baas/customers/{customerId}/accounts/{accountId}/cards/{cardId}/pin | Set or change a managed card PIN |
| [**managedCardLifecycleTerminate()**](DeveloperPortalManagedCardsApi.md#managedCardLifecycleTerminate) | **POST** /api/v1/baas/customers/{customerId}/accounts/{accountId}/cards/{cardId}/terminate | Terminate a managed card |
| [**managedCardLifecycleUnfreeze()**](DeveloperPortalManagedCardsApi.md#managedCardLifecycleUnfreeze) | **POST** /api/v1/baas/customers/{customerId}/accounts/{accountId}/cards/{cardId}/unfreeze | Unfreeze a managed card |
| [**managedCardReadIndex()**](DeveloperPortalManagedCardsApi.md#managedCardReadIndex) | **GET** /api/v1/baas/customers/{customerId}/accounts/{accountId}/cards | List managed cards for an account |
| [**managedCardReadShow()**](DeveloperPortalManagedCardsApi.md#managedCardReadShow) | **GET** /api/v1/baas/customers/{customerId}/accounts/{accountId}/cards/{cardId} | Show a managed card |
| [**managedCardReadTransactions()**](DeveloperPortalManagedCardsApi.md#managedCardReadTransactions) | **GET** /api/v1/baas/customers/{customerId}/accounts/{accountId}/cards/{cardId}/transactions | List managed card transactions |


## `developerCustomersAccountsCardsFreeze()`

```php
developerCustomersAccountsCardsFreeze($customer_id, $account_id, $card_id, $x_tenant_id, $idempotency_key): \MizanCore\BaasSdk\Generated\Model\ManagedCardReadIndex200Response
```

Freeze a managed card

Freezes (suspends) one of the partner's managed cards — reversible via unfreeze. Managed partners only; MANAGE_CARD consent required. Idempotent. Returns the masked card.

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


$apiInstance = new MizanCore\BaasSdk\Generated\Api\DeveloperPortalManagedCardsApi(
    // If you want use custom http client, pass your client which implements `GuzzleHttp\ClientInterface`.
    // This is optional, `GuzzleHttp\Client` will be used as default.
    new GuzzleHttp\Client(),
    $config
);
$customer_id = 00000000-0000-0000-0000-000000000001; // string
$account_id = 00000000-0000-0000-0000-000000000001; // string
$card_id = 00000000-0000-0000-0000-000000000001; // string
$x_tenant_id = world.test.localhost; // string | Tenant identifier (UUID or domain, e.g. world.test.localhost). Required on every tenant-scoped route. Maps to the tenant whose database serves this request. In production, prefer Host-header-based resolution; X-Tenant-ID is intended for non-production environments and is rejected (HTTP 400) on production hosts.
$idempotency_key = 'idempotency_key_example'; // string | Unique client-generated key (UUID recommended) for idempotent retry semantics. Duplicate requests return the cached response with header Idempotency-Replayed: true.

try {
    $result = $apiInstance->developerCustomersAccountsCardsFreeze($customer_id, $account_id, $card_id, $x_tenant_id, $idempotency_key);
    print_r($result);
} catch (Exception $e) {
    echo 'Exception when calling DeveloperPortalManagedCardsApi->developerCustomersAccountsCardsFreeze: ', $e->getMessage(), PHP_EOL;
}
```

### Parameters

| Name | Type | Description  | Notes |
| ------------- | ------------- | ------------- | ------------- |
| **customer_id** | **string**|  | |
| **account_id** | **string**|  | |
| **card_id** | **string**|  | |
| **x_tenant_id** | **string**| Tenant identifier (UUID or domain, e.g. world.test.localhost). Required on every tenant-scoped route. Maps to the tenant whose database serves this request. In production, prefer Host-header-based resolution; X-Tenant-ID is intended for non-production environments and is rejected (HTTP 400) on production hosts. | |
| **idempotency_key** | **string**| Unique client-generated key (UUID recommended) for idempotent retry semantics. Duplicate requests return the cached response with header Idempotency-Replayed: true. | |

### Return type

[**\MizanCore\BaasSdk\Generated\Model\ManagedCardReadIndex200Response**](../Model/ManagedCardReadIndex200Response.md)

### Authorization

[tenantHeader](../../README.md#tenantHeader), [hmacAuth](../../README.md#hmacAuth), [apiKeyAuth](../../README.md#apiKeyAuth)

### HTTP request headers

- **Content-Type**: Not defined
- **Accept**: `application/json`

[[Back to top]](#) [[Back to API list]](../../README.md#endpoints)
[[Back to Model list]](../../README.md#models)
[[Back to README]](../../README.md)

## `developerCustomersAccountsCardsIndex()`

```php
developerCustomersAccountsCardsIndex($customer_id, $account_id, $x_tenant_id): \MizanCore\BaasSdk\Generated\Model\ManagedCardReadIndex200Response
```

List managed cards for an account

Lists every card bound to one of the partner's sponsored accounts, newest first. Managed partners only; MANAGE_CARD consent required. Returns masked PANs only (never the raw card).

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


$apiInstance = new MizanCore\BaasSdk\Generated\Api\DeveloperPortalManagedCardsApi(
    // If you want use custom http client, pass your client which implements `GuzzleHttp\ClientInterface`.
    // This is optional, `GuzzleHttp\Client` will be used as default.
    new GuzzleHttp\Client(),
    $config
);
$customer_id = 00000000-0000-0000-0000-000000000001; // string
$account_id = 00000000-0000-0000-0000-000000000001; // string
$x_tenant_id = world.test.localhost; // string | Tenant identifier (UUID or domain, e.g. world.test.localhost). Required on every tenant-scoped route. Maps to the tenant whose database serves this request. In production, prefer Host-header-based resolution; X-Tenant-ID is intended for non-production environments and is rejected (HTTP 400) on production hosts.

try {
    $result = $apiInstance->developerCustomersAccountsCardsIndex($customer_id, $account_id, $x_tenant_id);
    print_r($result);
} catch (Exception $e) {
    echo 'Exception when calling DeveloperPortalManagedCardsApi->developerCustomersAccountsCardsIndex: ', $e->getMessage(), PHP_EOL;
}
```

### Parameters

| Name | Type | Description  | Notes |
| ------------- | ------------- | ------------- | ------------- |
| **customer_id** | **string**|  | |
| **account_id** | **string**|  | |
| **x_tenant_id** | **string**| Tenant identifier (UUID or domain, e.g. world.test.localhost). Required on every tenant-scoped route. Maps to the tenant whose database serves this request. In production, prefer Host-header-based resolution; X-Tenant-ID is intended for non-production environments and is rejected (HTTP 400) on production hosts. | |

### Return type

[**\MizanCore\BaasSdk\Generated\Model\ManagedCardReadIndex200Response**](../Model/ManagedCardReadIndex200Response.md)

### Authorization

[tenantHeader](../../README.md#tenantHeader), [hmacAuth](../../README.md#hmacAuth), [apiKeyAuth](../../README.md#apiKeyAuth)

### HTTP request headers

- **Content-Type**: Not defined
- **Accept**: `application/json`

[[Back to top]](#) [[Back to API list]](../../README.md#endpoints)
[[Back to Model list]](../../README.md#models)
[[Back to README]](../../README.md)

## `developerCustomersAccountsCardsIssue()`

```php
developerCustomersAccountsCardsIssue($customer_id, $account_id, $x_tenant_id, $idempotency_key, $issue_managed_card_request): \MizanCore\BaasSdk\Generated\Model\ManagedCardReadIndex200Response
```

Issue a managed virtual card

Issues a VIRTUAL debit card for one of the partner's sponsored accounts, inheriting the MFB tenant's card scheme/processor (sandbox → Fake/Mock adapter, no real card minted). Managed partners only; ISSUE_CARD consent required. Returns a masked PAN, never the raw card. Idempotent.

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


$apiInstance = new MizanCore\BaasSdk\Generated\Api\DeveloperPortalManagedCardsApi(
    // If you want use custom http client, pass your client which implements `GuzzleHttp\ClientInterface`.
    // This is optional, `GuzzleHttp\Client` will be used as default.
    new GuzzleHttp\Client(),
    $config
);
$customer_id = 00000000-0000-0000-0000-000000000001; // string
$account_id = 00000000-0000-0000-0000-000000000001; // string
$x_tenant_id = world.test.localhost; // string | Tenant identifier (UUID or domain, e.g. world.test.localhost). Required on every tenant-scoped route. Maps to the tenant whose database serves this request. In production, prefer Host-header-based resolution; X-Tenant-ID is intended for non-production environments and is rejected (HTTP 400) on production hosts.
$idempotency_key = 'idempotency_key_example'; // string | Unique client-generated key (UUID recommended) for idempotent retry semantics. Duplicate requests return the cached response with header Idempotency-Replayed: true.
$issue_managed_card_request = {"nickname":"example","limits":{}}; // \MizanCore\BaasSdk\Generated\Model\IssueManagedCardRequest

try {
    $result = $apiInstance->developerCustomersAccountsCardsIssue($customer_id, $account_id, $x_tenant_id, $idempotency_key, $issue_managed_card_request);
    print_r($result);
} catch (Exception $e) {
    echo 'Exception when calling DeveloperPortalManagedCardsApi->developerCustomersAccountsCardsIssue: ', $e->getMessage(), PHP_EOL;
}
```

### Parameters

| Name | Type | Description  | Notes |
| ------------- | ------------- | ------------- | ------------- |
| **customer_id** | **string**|  | |
| **account_id** | **string**|  | |
| **x_tenant_id** | **string**| Tenant identifier (UUID or domain, e.g. world.test.localhost). Required on every tenant-scoped route. Maps to the tenant whose database serves this request. In production, prefer Host-header-based resolution; X-Tenant-ID is intended for non-production environments and is rejected (HTTP 400) on production hosts. | |
| **idempotency_key** | **string**| Unique client-generated key (UUID recommended) for idempotent retry semantics. Duplicate requests return the cached response with header Idempotency-Replayed: true. | |
| **issue_managed_card_request** | [**\MizanCore\BaasSdk\Generated\Model\IssueManagedCardRequest**](../Model/IssueManagedCardRequest.md)|  | |

### Return type

[**\MizanCore\BaasSdk\Generated\Model\ManagedCardReadIndex200Response**](../Model/ManagedCardReadIndex200Response.md)

### Authorization

[tenantHeader](../../README.md#tenantHeader), [hmacAuth](../../README.md#hmacAuth), [apiKeyAuth](../../README.md#apiKeyAuth)

### HTTP request headers

- **Content-Type**: `application/json`
- **Accept**: `application/json`

[[Back to top]](#) [[Back to API list]](../../README.md#endpoints)
[[Back to Model list]](../../README.md#models)
[[Back to README]](../../README.md)

## `developerCustomersAccountsCardsLimits()`

```php
developerCustomersAccountsCardsLimits($customer_id, $account_id, $card_id, $x_tenant_id, $idempotency_key, $set_managed_card_limits_request): \MizanCore\BaasSdk\Generated\Model\ManagedCardReadIndex200Response
```

Set managed card spending limits

Sets per-card spending limits (daily ATM/POS/web + per-transaction, all in kobo) on a managed card. Partner-authorized: managed partners only; MANAGE_CARD consent + card ownership required.

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


$apiInstance = new MizanCore\BaasSdk\Generated\Api\DeveloperPortalManagedCardsApi(
    // If you want use custom http client, pass your client which implements `GuzzleHttp\ClientInterface`.
    // This is optional, `GuzzleHttp\Client` will be used as default.
    new GuzzleHttp\Client(),
    $config
);
$customer_id = 00000000-0000-0000-0000-000000000001; // string
$account_id = 00000000-0000-0000-0000-000000000001; // string
$card_id = 00000000-0000-0000-0000-000000000001; // string
$x_tenant_id = world.test.localhost; // string | Tenant identifier (UUID or domain, e.g. world.test.localhost). Required on every tenant-scoped route. Maps to the tenant whose database serves this request. In production, prefer Host-header-based resolution; X-Tenant-ID is intended for non-production environments and is rejected (HTTP 400) on production hosts.
$idempotency_key = 'idempotency_key_example'; // string | Unique client-generated key (UUID recommended) for idempotent retry semantics. Duplicate requests return the cached response with header Idempotency-Replayed: true.
$set_managed_card_limits_request = {"limits":{}}; // \MizanCore\BaasSdk\Generated\Model\SetManagedCardLimitsRequest

try {
    $result = $apiInstance->developerCustomersAccountsCardsLimits($customer_id, $account_id, $card_id, $x_tenant_id, $idempotency_key, $set_managed_card_limits_request);
    print_r($result);
} catch (Exception $e) {
    echo 'Exception when calling DeveloperPortalManagedCardsApi->developerCustomersAccountsCardsLimits: ', $e->getMessage(), PHP_EOL;
}
```

### Parameters

| Name | Type | Description  | Notes |
| ------------- | ------------- | ------------- | ------------- |
| **customer_id** | **string**|  | |
| **account_id** | **string**|  | |
| **card_id** | **string**|  | |
| **x_tenant_id** | **string**| Tenant identifier (UUID or domain, e.g. world.test.localhost). Required on every tenant-scoped route. Maps to the tenant whose database serves this request. In production, prefer Host-header-based resolution; X-Tenant-ID is intended for non-production environments and is rejected (HTTP 400) on production hosts. | |
| **idempotency_key** | **string**| Unique client-generated key (UUID recommended) for idempotent retry semantics. Duplicate requests return the cached response with header Idempotency-Replayed: true. | |
| **set_managed_card_limits_request** | [**\MizanCore\BaasSdk\Generated\Model\SetManagedCardLimitsRequest**](../Model/SetManagedCardLimitsRequest.md)|  | |

### Return type

[**\MizanCore\BaasSdk\Generated\Model\ManagedCardReadIndex200Response**](../Model/ManagedCardReadIndex200Response.md)

### Authorization

[tenantHeader](../../README.md#tenantHeader), [hmacAuth](../../README.md#hmacAuth), [apiKeyAuth](../../README.md#apiKeyAuth)

### HTTP request headers

- **Content-Type**: `application/json`
- **Accept**: `application/json`

[[Back to top]](#) [[Back to API list]](../../README.md#endpoints)
[[Back to Model list]](../../README.md#models)
[[Back to README]](../../README.md)

## `developerCustomersAccountsCardsPin()`

```php
developerCustomersAccountsCardsPin($customer_id, $account_id, $card_id, $x_tenant_id, $idempotency_key, $set_managed_card_pin_request): \MizanCore\BaasSdk\Generated\Model\ManagedCardReadIndex200Response
```

Set or change a managed card PIN

Sets or changes a managed card's PIN via the processor's secure PIN path. The raw PIN is transient — never persisted or logged at any layer. Managed partners only; MANAGE_CARD consent required. Returns the masked card (no PIN echo).

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


$apiInstance = new MizanCore\BaasSdk\Generated\Api\DeveloperPortalManagedCardsApi(
    // If you want use custom http client, pass your client which implements `GuzzleHttp\ClientInterface`.
    // This is optional, `GuzzleHttp\Client` will be used as default.
    new GuzzleHttp\Client(),
    $config
);
$customer_id = 00000000-0000-0000-0000-000000000001; // string
$account_id = 00000000-0000-0000-0000-000000000001; // string
$card_id = 00000000-0000-0000-0000-000000000001; // string
$x_tenant_id = world.test.localhost; // string | Tenant identifier (UUID or domain, e.g. world.test.localhost). Required on every tenant-scoped route. Maps to the tenant whose database serves this request. In production, prefer Host-header-based resolution; X-Tenant-ID is intended for non-production environments and is rejected (HTTP 400) on production hosts.
$idempotency_key = 'idempotency_key_example'; // string | Unique client-generated key (UUID recommended) for idempotent retry semantics. Duplicate requests return the cached response with header Idempotency-Replayed: true.
$set_managed_card_pin_request = {"pin":"example","current_pin":"example"}; // \MizanCore\BaasSdk\Generated\Model\SetManagedCardPinRequest

try {
    $result = $apiInstance->developerCustomersAccountsCardsPin($customer_id, $account_id, $card_id, $x_tenant_id, $idempotency_key, $set_managed_card_pin_request);
    print_r($result);
} catch (Exception $e) {
    echo 'Exception when calling DeveloperPortalManagedCardsApi->developerCustomersAccountsCardsPin: ', $e->getMessage(), PHP_EOL;
}
```

### Parameters

| Name | Type | Description  | Notes |
| ------------- | ------------- | ------------- | ------------- |
| **customer_id** | **string**|  | |
| **account_id** | **string**|  | |
| **card_id** | **string**|  | |
| **x_tenant_id** | **string**| Tenant identifier (UUID or domain, e.g. world.test.localhost). Required on every tenant-scoped route. Maps to the tenant whose database serves this request. In production, prefer Host-header-based resolution; X-Tenant-ID is intended for non-production environments and is rejected (HTTP 400) on production hosts. | |
| **idempotency_key** | **string**| Unique client-generated key (UUID recommended) for idempotent retry semantics. Duplicate requests return the cached response with header Idempotency-Replayed: true. | |
| **set_managed_card_pin_request** | [**\MizanCore\BaasSdk\Generated\Model\SetManagedCardPinRequest**](../Model/SetManagedCardPinRequest.md)|  | |

### Return type

[**\MizanCore\BaasSdk\Generated\Model\ManagedCardReadIndex200Response**](../Model/ManagedCardReadIndex200Response.md)

### Authorization

[tenantHeader](../../README.md#tenantHeader), [hmacAuth](../../README.md#hmacAuth), [apiKeyAuth](../../README.md#apiKeyAuth)

### HTTP request headers

- **Content-Type**: `application/json`
- **Accept**: `application/json`

[[Back to top]](#) [[Back to API list]](../../README.md#endpoints)
[[Back to Model list]](../../README.md#models)
[[Back to README]](../../README.md)

## `developerCustomersAccountsCardsShow()`

```php
developerCustomersAccountsCardsShow($customer_id, $account_id, $card_id, $x_tenant_id): \MizanCore\BaasSdk\Generated\Model\ManagedCardReadIndex200Response
```

Show a managed card

Returns one of the partner's managed cards — status, masked PAN + last4, expiry, network/scheme, and lifecycle state. Managed partners only; MANAGE_CARD consent + card ownership required. Never the raw card.

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


$apiInstance = new MizanCore\BaasSdk\Generated\Api\DeveloperPortalManagedCardsApi(
    // If you want use custom http client, pass your client which implements `GuzzleHttp\ClientInterface`.
    // This is optional, `GuzzleHttp\Client` will be used as default.
    new GuzzleHttp\Client(),
    $config
);
$customer_id = 00000000-0000-0000-0000-000000000001; // string
$account_id = 00000000-0000-0000-0000-000000000001; // string
$card_id = 00000000-0000-0000-0000-000000000001; // string
$x_tenant_id = world.test.localhost; // string | Tenant identifier (UUID or domain, e.g. world.test.localhost). Required on every tenant-scoped route. Maps to the tenant whose database serves this request. In production, prefer Host-header-based resolution; X-Tenant-ID is intended for non-production environments and is rejected (HTTP 400) on production hosts.

try {
    $result = $apiInstance->developerCustomersAccountsCardsShow($customer_id, $account_id, $card_id, $x_tenant_id);
    print_r($result);
} catch (Exception $e) {
    echo 'Exception when calling DeveloperPortalManagedCardsApi->developerCustomersAccountsCardsShow: ', $e->getMessage(), PHP_EOL;
}
```

### Parameters

| Name | Type | Description  | Notes |
| ------------- | ------------- | ------------- | ------------- |
| **customer_id** | **string**|  | |
| **account_id** | **string**|  | |
| **card_id** | **string**|  | |
| **x_tenant_id** | **string**| Tenant identifier (UUID or domain, e.g. world.test.localhost). Required on every tenant-scoped route. Maps to the tenant whose database serves this request. In production, prefer Host-header-based resolution; X-Tenant-ID is intended for non-production environments and is rejected (HTTP 400) on production hosts. | |

### Return type

[**\MizanCore\BaasSdk\Generated\Model\ManagedCardReadIndex200Response**](../Model/ManagedCardReadIndex200Response.md)

### Authorization

[tenantHeader](../../README.md#tenantHeader), [hmacAuth](../../README.md#hmacAuth), [apiKeyAuth](../../README.md#apiKeyAuth)

### HTTP request headers

- **Content-Type**: Not defined
- **Accept**: `application/json`

[[Back to top]](#) [[Back to API list]](../../README.md#endpoints)
[[Back to Model list]](../../README.md#models)
[[Back to README]](../../README.md)

## `developerCustomersAccountsCardsTerminate()`

```php
developerCustomersAccountsCardsTerminate($customer_id, $account_id, $card_id, $x_tenant_id, $idempotency_key, $terminate_managed_card_request): \MizanCore\BaasSdk\Generated\Model\ManagedCardReadIndex200Response
```

Terminate a managed card

Permanently terminates a managed card — IRREVERSIBLE (the card can never transact or be re-activated). Partner-authorized: managed partners only; MANAGE_CARD consent + card ownership required. Returns the masked card.

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


$apiInstance = new MizanCore\BaasSdk\Generated\Api\DeveloperPortalManagedCardsApi(
    // If you want use custom http client, pass your client which implements `GuzzleHttp\ClientInterface`.
    // This is optional, `GuzzleHttp\Client` will be used as default.
    new GuzzleHttp\Client(),
    $config
);
$customer_id = 00000000-0000-0000-0000-000000000001; // string
$account_id = 00000000-0000-0000-0000-000000000001; // string
$card_id = 00000000-0000-0000-0000-000000000001; // string
$x_tenant_id = world.test.localhost; // string | Tenant identifier (UUID or domain, e.g. world.test.localhost). Required on every tenant-scoped route. Maps to the tenant whose database serves this request. In production, prefer Host-header-based resolution; X-Tenant-ID is intended for non-production environments and is rejected (HTTP 400) on production hosts.
$idempotency_key = 'idempotency_key_example'; // string | Unique client-generated key (UUID recommended) for idempotent retry semantics. Duplicate requests return the cached response with header Idempotency-Replayed: true.
$terminate_managed_card_request = {"reason":"example"}; // \MizanCore\BaasSdk\Generated\Model\TerminateManagedCardRequest

try {
    $result = $apiInstance->developerCustomersAccountsCardsTerminate($customer_id, $account_id, $card_id, $x_tenant_id, $idempotency_key, $terminate_managed_card_request);
    print_r($result);
} catch (Exception $e) {
    echo 'Exception when calling DeveloperPortalManagedCardsApi->developerCustomersAccountsCardsTerminate: ', $e->getMessage(), PHP_EOL;
}
```

### Parameters

| Name | Type | Description  | Notes |
| ------------- | ------------- | ------------- | ------------- |
| **customer_id** | **string**|  | |
| **account_id** | **string**|  | |
| **card_id** | **string**|  | |
| **x_tenant_id** | **string**| Tenant identifier (UUID or domain, e.g. world.test.localhost). Required on every tenant-scoped route. Maps to the tenant whose database serves this request. In production, prefer Host-header-based resolution; X-Tenant-ID is intended for non-production environments and is rejected (HTTP 400) on production hosts. | |
| **idempotency_key** | **string**| Unique client-generated key (UUID recommended) for idempotent retry semantics. Duplicate requests return the cached response with header Idempotency-Replayed: true. | |
| **terminate_managed_card_request** | [**\MizanCore\BaasSdk\Generated\Model\TerminateManagedCardRequest**](../Model/TerminateManagedCardRequest.md)|  | |

### Return type

[**\MizanCore\BaasSdk\Generated\Model\ManagedCardReadIndex200Response**](../Model/ManagedCardReadIndex200Response.md)

### Authorization

[tenantHeader](../../README.md#tenantHeader), [hmacAuth](../../README.md#hmacAuth), [apiKeyAuth](../../README.md#apiKeyAuth)

### HTTP request headers

- **Content-Type**: `application/json`
- **Accept**: `application/json`

[[Back to top]](#) [[Back to API list]](../../README.md#endpoints)
[[Back to Model list]](../../README.md#models)
[[Back to README]](../../README.md)

## `developerCustomersAccountsCardsTransactions()`

```php
developerCustomersAccountsCardsTransactions($customer_id, $account_id, $card_id, $x_tenant_id, $per_page, $page): \MizanCore\BaasSdk\Generated\Model\ManagedCardReadTransactions200Response
```

List managed card transactions

Returns a paginated transaction history for one of the partner's managed cards, newest first. Money values are in kobo. Managed partners only; requires a granted TRANSACTION_HISTORY consent for the customer (stronger than MANAGE_CARD — reading card spend history is a distinct purpose) + card ownership.

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


$apiInstance = new MizanCore\BaasSdk\Generated\Api\DeveloperPortalManagedCardsApi(
    // If you want use custom http client, pass your client which implements `GuzzleHttp\ClientInterface`.
    // This is optional, `GuzzleHttp\Client` will be used as default.
    new GuzzleHttp\Client(),
    $config
);
$customer_id = 00000000-0000-0000-0000-000000000001; // string
$account_id = 00000000-0000-0000-0000-000000000001; // string
$card_id = 00000000-0000-0000-0000-000000000001; // string
$x_tenant_id = world.test.localhost; // string | Tenant identifier (UUID or domain, e.g. world.test.localhost). Required on every tenant-scoped route. Maps to the tenant whose database serves this request. In production, prefer Host-header-based resolution; X-Tenant-ID is intended for non-production environments and is rejected (HTTP 400) on production hosts.
$per_page = 56; // int | Page size (1–100, default 20).
$page = 56; // int | 1-based page number (default 1).

try {
    $result = $apiInstance->developerCustomersAccountsCardsTransactions($customer_id, $account_id, $card_id, $x_tenant_id, $per_page, $page);
    print_r($result);
} catch (Exception $e) {
    echo 'Exception when calling DeveloperPortalManagedCardsApi->developerCustomersAccountsCardsTransactions: ', $e->getMessage(), PHP_EOL;
}
```

### Parameters

| Name | Type | Description  | Notes |
| ------------- | ------------- | ------------- | ------------- |
| **customer_id** | **string**|  | |
| **account_id** | **string**|  | |
| **card_id** | **string**|  | |
| **x_tenant_id** | **string**| Tenant identifier (UUID or domain, e.g. world.test.localhost). Required on every tenant-scoped route. Maps to the tenant whose database serves this request. In production, prefer Host-header-based resolution; X-Tenant-ID is intended for non-production environments and is rejected (HTTP 400) on production hosts. | |
| **per_page** | **int**| Page size (1–100, default 20). | [optional] |
| **page** | **int**| 1-based page number (default 1). | [optional] |

### Return type

[**\MizanCore\BaasSdk\Generated\Model\ManagedCardReadTransactions200Response**](../Model/ManagedCardReadTransactions200Response.md)

### Authorization

[tenantHeader](../../README.md#tenantHeader), [hmacAuth](../../README.md#hmacAuth), [apiKeyAuth](../../README.md#apiKeyAuth)

### HTTP request headers

- **Content-Type**: Not defined
- **Accept**: `application/json`

[[Back to top]](#) [[Back to API list]](../../README.md#endpoints)
[[Back to Model list]](../../README.md#models)
[[Back to README]](../../README.md)

## `developerCustomersAccountsCardsUnfreeze()`

```php
developerCustomersAccountsCardsUnfreeze($customer_id, $account_id, $card_id, $x_tenant_id, $idempotency_key): \MizanCore\BaasSdk\Generated\Model\ManagedCardReadIndex200Response
```

Unfreeze a managed card

Unfreezes (resumes) a previously-frozen managed card → active. A terminated card can never be unfrozen. Managed partners only; MANAGE_CARD consent required. Idempotent. Returns the masked card.

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


$apiInstance = new MizanCore\BaasSdk\Generated\Api\DeveloperPortalManagedCardsApi(
    // If you want use custom http client, pass your client which implements `GuzzleHttp\ClientInterface`.
    // This is optional, `GuzzleHttp\Client` will be used as default.
    new GuzzleHttp\Client(),
    $config
);
$customer_id = 00000000-0000-0000-0000-000000000001; // string
$account_id = 00000000-0000-0000-0000-000000000001; // string
$card_id = 00000000-0000-0000-0000-000000000001; // string
$x_tenant_id = world.test.localhost; // string | Tenant identifier (UUID or domain, e.g. world.test.localhost). Required on every tenant-scoped route. Maps to the tenant whose database serves this request. In production, prefer Host-header-based resolution; X-Tenant-ID is intended for non-production environments and is rejected (HTTP 400) on production hosts.
$idempotency_key = 'idempotency_key_example'; // string | Unique client-generated key (UUID recommended) for idempotent retry semantics. Duplicate requests return the cached response with header Idempotency-Replayed: true.

try {
    $result = $apiInstance->developerCustomersAccountsCardsUnfreeze($customer_id, $account_id, $card_id, $x_tenant_id, $idempotency_key);
    print_r($result);
} catch (Exception $e) {
    echo 'Exception when calling DeveloperPortalManagedCardsApi->developerCustomersAccountsCardsUnfreeze: ', $e->getMessage(), PHP_EOL;
}
```

### Parameters

| Name | Type | Description  | Notes |
| ------------- | ------------- | ------------- | ------------- |
| **customer_id** | **string**|  | |
| **account_id** | **string**|  | |
| **card_id** | **string**|  | |
| **x_tenant_id** | **string**| Tenant identifier (UUID or domain, e.g. world.test.localhost). Required on every tenant-scoped route. Maps to the tenant whose database serves this request. In production, prefer Host-header-based resolution; X-Tenant-ID is intended for non-production environments and is rejected (HTTP 400) on production hosts. | |
| **idempotency_key** | **string**| Unique client-generated key (UUID recommended) for idempotent retry semantics. Duplicate requests return the cached response with header Idempotency-Replayed: true. | |

### Return type

[**\MizanCore\BaasSdk\Generated\Model\ManagedCardReadIndex200Response**](../Model/ManagedCardReadIndex200Response.md)

### Authorization

[tenantHeader](../../README.md#tenantHeader), [hmacAuth](../../README.md#hmacAuth), [apiKeyAuth](../../README.md#apiKeyAuth)

### HTTP request headers

- **Content-Type**: Not defined
- **Accept**: `application/json`

[[Back to top]](#) [[Back to API list]](../../README.md#endpoints)
[[Back to Model list]](../../README.md#models)
[[Back to README]](../../README.md)

## `managedCardIssue()`

```php
managedCardIssue($customer_id, $account_id, $x_tenant_id, $idempotency_key, $issue_managed_card_request): \MizanCore\BaasSdk\Generated\Model\ManagedCardReadIndex200Response
```

Issue a managed virtual card

Issues a VIRTUAL debit card for one of the partner's sponsored accounts, inheriting the MFB tenant's card scheme/processor (sandbox → Fake/Mock adapter, no real card minted). Managed partners only; ISSUE_CARD consent required. Returns a masked PAN, never the raw card. Idempotent.

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


$apiInstance = new MizanCore\BaasSdk\Generated\Api\DeveloperPortalManagedCardsApi(
    // If you want use custom http client, pass your client which implements `GuzzleHttp\ClientInterface`.
    // This is optional, `GuzzleHttp\Client` will be used as default.
    new GuzzleHttp\Client(),
    $config
);
$customer_id = 00000000-0000-0000-0000-000000000001; // string
$account_id = 00000000-0000-0000-0000-000000000001; // string
$x_tenant_id = world.test.localhost; // string | Tenant identifier (UUID or domain, e.g. world.test.localhost). Required on every tenant-scoped route. Maps to the tenant whose database serves this request. In production, prefer Host-header-based resolution; X-Tenant-ID is intended for non-production environments and is rejected (HTTP 400) on production hosts.
$idempotency_key = 'idempotency_key_example'; // string | Unique client-generated key (UUID recommended) for idempotent retry semantics. Duplicate requests return the cached response with header Idempotency-Replayed: true.
$issue_managed_card_request = {"nickname":"example","limits":{}}; // \MizanCore\BaasSdk\Generated\Model\IssueManagedCardRequest

try {
    $result = $apiInstance->managedCardIssue($customer_id, $account_id, $x_tenant_id, $idempotency_key, $issue_managed_card_request);
    print_r($result);
} catch (Exception $e) {
    echo 'Exception when calling DeveloperPortalManagedCardsApi->managedCardIssue: ', $e->getMessage(), PHP_EOL;
}
```

### Parameters

| Name | Type | Description  | Notes |
| ------------- | ------------- | ------------- | ------------- |
| **customer_id** | **string**|  | |
| **account_id** | **string**|  | |
| **x_tenant_id** | **string**| Tenant identifier (UUID or domain, e.g. world.test.localhost). Required on every tenant-scoped route. Maps to the tenant whose database serves this request. In production, prefer Host-header-based resolution; X-Tenant-ID is intended for non-production environments and is rejected (HTTP 400) on production hosts. | |
| **idempotency_key** | **string**| Unique client-generated key (UUID recommended) for idempotent retry semantics. Duplicate requests return the cached response with header Idempotency-Replayed: true. | |
| **issue_managed_card_request** | [**\MizanCore\BaasSdk\Generated\Model\IssueManagedCardRequest**](../Model/IssueManagedCardRequest.md)|  | |

### Return type

[**\MizanCore\BaasSdk\Generated\Model\ManagedCardReadIndex200Response**](../Model/ManagedCardReadIndex200Response.md)

### Authorization

[tenantHeader](../../README.md#tenantHeader), [hmacAuth](../../README.md#hmacAuth), [apiKeyAuth](../../README.md#apiKeyAuth)

### HTTP request headers

- **Content-Type**: `application/json`
- **Accept**: `application/json`

[[Back to top]](#) [[Back to API list]](../../README.md#endpoints)
[[Back to Model list]](../../README.md#models)
[[Back to README]](../../README.md)

## `managedCardLifecycleFreeze()`

```php
managedCardLifecycleFreeze($customer_id, $account_id, $card_id, $x_tenant_id, $idempotency_key): \MizanCore\BaasSdk\Generated\Model\ManagedCardReadIndex200Response
```

Freeze a managed card

Freezes (suspends) one of the partner's managed cards — reversible via unfreeze. Managed partners only; MANAGE_CARD consent required. Idempotent. Returns the masked card.

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


$apiInstance = new MizanCore\BaasSdk\Generated\Api\DeveloperPortalManagedCardsApi(
    // If you want use custom http client, pass your client which implements `GuzzleHttp\ClientInterface`.
    // This is optional, `GuzzleHttp\Client` will be used as default.
    new GuzzleHttp\Client(),
    $config
);
$customer_id = 00000000-0000-0000-0000-000000000001; // string
$account_id = 00000000-0000-0000-0000-000000000001; // string
$card_id = 00000000-0000-0000-0000-000000000001; // string
$x_tenant_id = world.test.localhost; // string | Tenant identifier (UUID or domain, e.g. world.test.localhost). Required on every tenant-scoped route. Maps to the tenant whose database serves this request. In production, prefer Host-header-based resolution; X-Tenant-ID is intended for non-production environments and is rejected (HTTP 400) on production hosts.
$idempotency_key = 'idempotency_key_example'; // string | Unique client-generated key (UUID recommended) for idempotent retry semantics. Duplicate requests return the cached response with header Idempotency-Replayed: true.

try {
    $result = $apiInstance->managedCardLifecycleFreeze($customer_id, $account_id, $card_id, $x_tenant_id, $idempotency_key);
    print_r($result);
} catch (Exception $e) {
    echo 'Exception when calling DeveloperPortalManagedCardsApi->managedCardLifecycleFreeze: ', $e->getMessage(), PHP_EOL;
}
```

### Parameters

| Name | Type | Description  | Notes |
| ------------- | ------------- | ------------- | ------------- |
| **customer_id** | **string**|  | |
| **account_id** | **string**|  | |
| **card_id** | **string**|  | |
| **x_tenant_id** | **string**| Tenant identifier (UUID or domain, e.g. world.test.localhost). Required on every tenant-scoped route. Maps to the tenant whose database serves this request. In production, prefer Host-header-based resolution; X-Tenant-ID is intended for non-production environments and is rejected (HTTP 400) on production hosts. | |
| **idempotency_key** | **string**| Unique client-generated key (UUID recommended) for idempotent retry semantics. Duplicate requests return the cached response with header Idempotency-Replayed: true. | |

### Return type

[**\MizanCore\BaasSdk\Generated\Model\ManagedCardReadIndex200Response**](../Model/ManagedCardReadIndex200Response.md)

### Authorization

[tenantHeader](../../README.md#tenantHeader), [hmacAuth](../../README.md#hmacAuth), [apiKeyAuth](../../README.md#apiKeyAuth)

### HTTP request headers

- **Content-Type**: Not defined
- **Accept**: `application/json`

[[Back to top]](#) [[Back to API list]](../../README.md#endpoints)
[[Back to Model list]](../../README.md#models)
[[Back to README]](../../README.md)

## `managedCardLifecycleSetLimits()`

```php
managedCardLifecycleSetLimits($customer_id, $account_id, $card_id, $x_tenant_id, $idempotency_key, $set_managed_card_limits_request): \MizanCore\BaasSdk\Generated\Model\ManagedCardReadIndex200Response
```

Set managed card spending limits

Sets per-card spending limits (daily ATM/POS/web + per-transaction, all in kobo) on a managed card. Partner-authorized: managed partners only; MANAGE_CARD consent + card ownership required.

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


$apiInstance = new MizanCore\BaasSdk\Generated\Api\DeveloperPortalManagedCardsApi(
    // If you want use custom http client, pass your client which implements `GuzzleHttp\ClientInterface`.
    // This is optional, `GuzzleHttp\Client` will be used as default.
    new GuzzleHttp\Client(),
    $config
);
$customer_id = 00000000-0000-0000-0000-000000000001; // string
$account_id = 00000000-0000-0000-0000-000000000001; // string
$card_id = 00000000-0000-0000-0000-000000000001; // string
$x_tenant_id = world.test.localhost; // string | Tenant identifier (UUID or domain, e.g. world.test.localhost). Required on every tenant-scoped route. Maps to the tenant whose database serves this request. In production, prefer Host-header-based resolution; X-Tenant-ID is intended for non-production environments and is rejected (HTTP 400) on production hosts.
$idempotency_key = 'idempotency_key_example'; // string | Unique client-generated key (UUID recommended) for idempotent retry semantics. Duplicate requests return the cached response with header Idempotency-Replayed: true.
$set_managed_card_limits_request = {"limits":{}}; // \MizanCore\BaasSdk\Generated\Model\SetManagedCardLimitsRequest

try {
    $result = $apiInstance->managedCardLifecycleSetLimits($customer_id, $account_id, $card_id, $x_tenant_id, $idempotency_key, $set_managed_card_limits_request);
    print_r($result);
} catch (Exception $e) {
    echo 'Exception when calling DeveloperPortalManagedCardsApi->managedCardLifecycleSetLimits: ', $e->getMessage(), PHP_EOL;
}
```

### Parameters

| Name | Type | Description  | Notes |
| ------------- | ------------- | ------------- | ------------- |
| **customer_id** | **string**|  | |
| **account_id** | **string**|  | |
| **card_id** | **string**|  | |
| **x_tenant_id** | **string**| Tenant identifier (UUID or domain, e.g. world.test.localhost). Required on every tenant-scoped route. Maps to the tenant whose database serves this request. In production, prefer Host-header-based resolution; X-Tenant-ID is intended for non-production environments and is rejected (HTTP 400) on production hosts. | |
| **idempotency_key** | **string**| Unique client-generated key (UUID recommended) for idempotent retry semantics. Duplicate requests return the cached response with header Idempotency-Replayed: true. | |
| **set_managed_card_limits_request** | [**\MizanCore\BaasSdk\Generated\Model\SetManagedCardLimitsRequest**](../Model/SetManagedCardLimitsRequest.md)|  | |

### Return type

[**\MizanCore\BaasSdk\Generated\Model\ManagedCardReadIndex200Response**](../Model/ManagedCardReadIndex200Response.md)

### Authorization

[tenantHeader](../../README.md#tenantHeader), [hmacAuth](../../README.md#hmacAuth), [apiKeyAuth](../../README.md#apiKeyAuth)

### HTTP request headers

- **Content-Type**: `application/json`
- **Accept**: `application/json`

[[Back to top]](#) [[Back to API list]](../../README.md#endpoints)
[[Back to Model list]](../../README.md#models)
[[Back to README]](../../README.md)

## `managedCardLifecycleSetPin()`

```php
managedCardLifecycleSetPin($customer_id, $account_id, $card_id, $x_tenant_id, $idempotency_key, $set_managed_card_pin_request): \MizanCore\BaasSdk\Generated\Model\ManagedCardReadIndex200Response
```

Set or change a managed card PIN

Sets or changes a managed card's PIN via the processor's secure PIN path. The raw PIN is transient — never persisted or logged at any layer. Managed partners only; MANAGE_CARD consent required. Returns the masked card (no PIN echo).

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


$apiInstance = new MizanCore\BaasSdk\Generated\Api\DeveloperPortalManagedCardsApi(
    // If you want use custom http client, pass your client which implements `GuzzleHttp\ClientInterface`.
    // This is optional, `GuzzleHttp\Client` will be used as default.
    new GuzzleHttp\Client(),
    $config
);
$customer_id = 00000000-0000-0000-0000-000000000001; // string
$account_id = 00000000-0000-0000-0000-000000000001; // string
$card_id = 00000000-0000-0000-0000-000000000001; // string
$x_tenant_id = world.test.localhost; // string | Tenant identifier (UUID or domain, e.g. world.test.localhost). Required on every tenant-scoped route. Maps to the tenant whose database serves this request. In production, prefer Host-header-based resolution; X-Tenant-ID is intended for non-production environments and is rejected (HTTP 400) on production hosts.
$idempotency_key = 'idempotency_key_example'; // string | Unique client-generated key (UUID recommended) for idempotent retry semantics. Duplicate requests return the cached response with header Idempotency-Replayed: true.
$set_managed_card_pin_request = {"pin":"example","current_pin":"example"}; // \MizanCore\BaasSdk\Generated\Model\SetManagedCardPinRequest

try {
    $result = $apiInstance->managedCardLifecycleSetPin($customer_id, $account_id, $card_id, $x_tenant_id, $idempotency_key, $set_managed_card_pin_request);
    print_r($result);
} catch (Exception $e) {
    echo 'Exception when calling DeveloperPortalManagedCardsApi->managedCardLifecycleSetPin: ', $e->getMessage(), PHP_EOL;
}
```

### Parameters

| Name | Type | Description  | Notes |
| ------------- | ------------- | ------------- | ------------- |
| **customer_id** | **string**|  | |
| **account_id** | **string**|  | |
| **card_id** | **string**|  | |
| **x_tenant_id** | **string**| Tenant identifier (UUID or domain, e.g. world.test.localhost). Required on every tenant-scoped route. Maps to the tenant whose database serves this request. In production, prefer Host-header-based resolution; X-Tenant-ID is intended for non-production environments and is rejected (HTTP 400) on production hosts. | |
| **idempotency_key** | **string**| Unique client-generated key (UUID recommended) for idempotent retry semantics. Duplicate requests return the cached response with header Idempotency-Replayed: true. | |
| **set_managed_card_pin_request** | [**\MizanCore\BaasSdk\Generated\Model\SetManagedCardPinRequest**](../Model/SetManagedCardPinRequest.md)|  | |

### Return type

[**\MizanCore\BaasSdk\Generated\Model\ManagedCardReadIndex200Response**](../Model/ManagedCardReadIndex200Response.md)

### Authorization

[tenantHeader](../../README.md#tenantHeader), [hmacAuth](../../README.md#hmacAuth), [apiKeyAuth](../../README.md#apiKeyAuth)

### HTTP request headers

- **Content-Type**: `application/json`
- **Accept**: `application/json`

[[Back to top]](#) [[Back to API list]](../../README.md#endpoints)
[[Back to Model list]](../../README.md#models)
[[Back to README]](../../README.md)

## `managedCardLifecycleTerminate()`

```php
managedCardLifecycleTerminate($customer_id, $account_id, $card_id, $x_tenant_id, $idempotency_key, $terminate_managed_card_request): \MizanCore\BaasSdk\Generated\Model\ManagedCardReadIndex200Response
```

Terminate a managed card

Permanently terminates a managed card — IRREVERSIBLE (the card can never transact or be re-activated). Partner-authorized: managed partners only; MANAGE_CARD consent + card ownership required. Returns the masked card.

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


$apiInstance = new MizanCore\BaasSdk\Generated\Api\DeveloperPortalManagedCardsApi(
    // If you want use custom http client, pass your client which implements `GuzzleHttp\ClientInterface`.
    // This is optional, `GuzzleHttp\Client` will be used as default.
    new GuzzleHttp\Client(),
    $config
);
$customer_id = 00000000-0000-0000-0000-000000000001; // string
$account_id = 00000000-0000-0000-0000-000000000001; // string
$card_id = 00000000-0000-0000-0000-000000000001; // string
$x_tenant_id = world.test.localhost; // string | Tenant identifier (UUID or domain, e.g. world.test.localhost). Required on every tenant-scoped route. Maps to the tenant whose database serves this request. In production, prefer Host-header-based resolution; X-Tenant-ID is intended for non-production environments and is rejected (HTTP 400) on production hosts.
$idempotency_key = 'idempotency_key_example'; // string | Unique client-generated key (UUID recommended) for idempotent retry semantics. Duplicate requests return the cached response with header Idempotency-Replayed: true.
$terminate_managed_card_request = {"reason":"example"}; // \MizanCore\BaasSdk\Generated\Model\TerminateManagedCardRequest

try {
    $result = $apiInstance->managedCardLifecycleTerminate($customer_id, $account_id, $card_id, $x_tenant_id, $idempotency_key, $terminate_managed_card_request);
    print_r($result);
} catch (Exception $e) {
    echo 'Exception when calling DeveloperPortalManagedCardsApi->managedCardLifecycleTerminate: ', $e->getMessage(), PHP_EOL;
}
```

### Parameters

| Name | Type | Description  | Notes |
| ------------- | ------------- | ------------- | ------------- |
| **customer_id** | **string**|  | |
| **account_id** | **string**|  | |
| **card_id** | **string**|  | |
| **x_tenant_id** | **string**| Tenant identifier (UUID or domain, e.g. world.test.localhost). Required on every tenant-scoped route. Maps to the tenant whose database serves this request. In production, prefer Host-header-based resolution; X-Tenant-ID is intended for non-production environments and is rejected (HTTP 400) on production hosts. | |
| **idempotency_key** | **string**| Unique client-generated key (UUID recommended) for idempotent retry semantics. Duplicate requests return the cached response with header Idempotency-Replayed: true. | |
| **terminate_managed_card_request** | [**\MizanCore\BaasSdk\Generated\Model\TerminateManagedCardRequest**](../Model/TerminateManagedCardRequest.md)|  | |

### Return type

[**\MizanCore\BaasSdk\Generated\Model\ManagedCardReadIndex200Response**](../Model/ManagedCardReadIndex200Response.md)

### Authorization

[tenantHeader](../../README.md#tenantHeader), [hmacAuth](../../README.md#hmacAuth), [apiKeyAuth](../../README.md#apiKeyAuth)

### HTTP request headers

- **Content-Type**: `application/json`
- **Accept**: `application/json`

[[Back to top]](#) [[Back to API list]](../../README.md#endpoints)
[[Back to Model list]](../../README.md#models)
[[Back to README]](../../README.md)

## `managedCardLifecycleUnfreeze()`

```php
managedCardLifecycleUnfreeze($customer_id, $account_id, $card_id, $x_tenant_id, $idempotency_key): \MizanCore\BaasSdk\Generated\Model\ManagedCardReadIndex200Response
```

Unfreeze a managed card

Unfreezes (resumes) a previously-frozen managed card → active. A terminated card can never be unfrozen. Managed partners only; MANAGE_CARD consent required. Idempotent. Returns the masked card.

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


$apiInstance = new MizanCore\BaasSdk\Generated\Api\DeveloperPortalManagedCardsApi(
    // If you want use custom http client, pass your client which implements `GuzzleHttp\ClientInterface`.
    // This is optional, `GuzzleHttp\Client` will be used as default.
    new GuzzleHttp\Client(),
    $config
);
$customer_id = 00000000-0000-0000-0000-000000000001; // string
$account_id = 00000000-0000-0000-0000-000000000001; // string
$card_id = 00000000-0000-0000-0000-000000000001; // string
$x_tenant_id = world.test.localhost; // string | Tenant identifier (UUID or domain, e.g. world.test.localhost). Required on every tenant-scoped route. Maps to the tenant whose database serves this request. In production, prefer Host-header-based resolution; X-Tenant-ID is intended for non-production environments and is rejected (HTTP 400) on production hosts.
$idempotency_key = 'idempotency_key_example'; // string | Unique client-generated key (UUID recommended) for idempotent retry semantics. Duplicate requests return the cached response with header Idempotency-Replayed: true.

try {
    $result = $apiInstance->managedCardLifecycleUnfreeze($customer_id, $account_id, $card_id, $x_tenant_id, $idempotency_key);
    print_r($result);
} catch (Exception $e) {
    echo 'Exception when calling DeveloperPortalManagedCardsApi->managedCardLifecycleUnfreeze: ', $e->getMessage(), PHP_EOL;
}
```

### Parameters

| Name | Type | Description  | Notes |
| ------------- | ------------- | ------------- | ------------- |
| **customer_id** | **string**|  | |
| **account_id** | **string**|  | |
| **card_id** | **string**|  | |
| **x_tenant_id** | **string**| Tenant identifier (UUID or domain, e.g. world.test.localhost). Required on every tenant-scoped route. Maps to the tenant whose database serves this request. In production, prefer Host-header-based resolution; X-Tenant-ID is intended for non-production environments and is rejected (HTTP 400) on production hosts. | |
| **idempotency_key** | **string**| Unique client-generated key (UUID recommended) for idempotent retry semantics. Duplicate requests return the cached response with header Idempotency-Replayed: true. | |

### Return type

[**\MizanCore\BaasSdk\Generated\Model\ManagedCardReadIndex200Response**](../Model/ManagedCardReadIndex200Response.md)

### Authorization

[tenantHeader](../../README.md#tenantHeader), [hmacAuth](../../README.md#hmacAuth), [apiKeyAuth](../../README.md#apiKeyAuth)

### HTTP request headers

- **Content-Type**: Not defined
- **Accept**: `application/json`

[[Back to top]](#) [[Back to API list]](../../README.md#endpoints)
[[Back to Model list]](../../README.md#models)
[[Back to README]](../../README.md)

## `managedCardReadIndex()`

```php
managedCardReadIndex($customer_id, $account_id, $x_tenant_id): \MizanCore\BaasSdk\Generated\Model\ManagedCardReadIndex200Response
```

List managed cards for an account

Lists every card bound to one of the partner's sponsored accounts, newest first. Managed partners only; MANAGE_CARD consent required. Returns masked PANs only (never the raw card).

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


$apiInstance = new MizanCore\BaasSdk\Generated\Api\DeveloperPortalManagedCardsApi(
    // If you want use custom http client, pass your client which implements `GuzzleHttp\ClientInterface`.
    // This is optional, `GuzzleHttp\Client` will be used as default.
    new GuzzleHttp\Client(),
    $config
);
$customer_id = 00000000-0000-0000-0000-000000000001; // string
$account_id = 00000000-0000-0000-0000-000000000001; // string
$x_tenant_id = world.test.localhost; // string | Tenant identifier (UUID or domain, e.g. world.test.localhost). Required on every tenant-scoped route. Maps to the tenant whose database serves this request. In production, prefer Host-header-based resolution; X-Tenant-ID is intended for non-production environments and is rejected (HTTP 400) on production hosts.

try {
    $result = $apiInstance->managedCardReadIndex($customer_id, $account_id, $x_tenant_id);
    print_r($result);
} catch (Exception $e) {
    echo 'Exception when calling DeveloperPortalManagedCardsApi->managedCardReadIndex: ', $e->getMessage(), PHP_EOL;
}
```

### Parameters

| Name | Type | Description  | Notes |
| ------------- | ------------- | ------------- | ------------- |
| **customer_id** | **string**|  | |
| **account_id** | **string**|  | |
| **x_tenant_id** | **string**| Tenant identifier (UUID or domain, e.g. world.test.localhost). Required on every tenant-scoped route. Maps to the tenant whose database serves this request. In production, prefer Host-header-based resolution; X-Tenant-ID is intended for non-production environments and is rejected (HTTP 400) on production hosts. | |

### Return type

[**\MizanCore\BaasSdk\Generated\Model\ManagedCardReadIndex200Response**](../Model/ManagedCardReadIndex200Response.md)

### Authorization

[tenantHeader](../../README.md#tenantHeader), [hmacAuth](../../README.md#hmacAuth), [apiKeyAuth](../../README.md#apiKeyAuth)

### HTTP request headers

- **Content-Type**: Not defined
- **Accept**: `application/json`

[[Back to top]](#) [[Back to API list]](../../README.md#endpoints)
[[Back to Model list]](../../README.md#models)
[[Back to README]](../../README.md)

## `managedCardReadShow()`

```php
managedCardReadShow($customer_id, $account_id, $card_id, $x_tenant_id): \MizanCore\BaasSdk\Generated\Model\ManagedCardReadIndex200Response
```

Show a managed card

Returns one of the partner's managed cards — status, masked PAN + last4, expiry, network/scheme, and lifecycle state. Managed partners only; MANAGE_CARD consent + card ownership required. Never the raw card.

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


$apiInstance = new MizanCore\BaasSdk\Generated\Api\DeveloperPortalManagedCardsApi(
    // If you want use custom http client, pass your client which implements `GuzzleHttp\ClientInterface`.
    // This is optional, `GuzzleHttp\Client` will be used as default.
    new GuzzleHttp\Client(),
    $config
);
$customer_id = 00000000-0000-0000-0000-000000000001; // string
$account_id = 00000000-0000-0000-0000-000000000001; // string
$card_id = 00000000-0000-0000-0000-000000000001; // string
$x_tenant_id = world.test.localhost; // string | Tenant identifier (UUID or domain, e.g. world.test.localhost). Required on every tenant-scoped route. Maps to the tenant whose database serves this request. In production, prefer Host-header-based resolution; X-Tenant-ID is intended for non-production environments and is rejected (HTTP 400) on production hosts.

try {
    $result = $apiInstance->managedCardReadShow($customer_id, $account_id, $card_id, $x_tenant_id);
    print_r($result);
} catch (Exception $e) {
    echo 'Exception when calling DeveloperPortalManagedCardsApi->managedCardReadShow: ', $e->getMessage(), PHP_EOL;
}
```

### Parameters

| Name | Type | Description  | Notes |
| ------------- | ------------- | ------------- | ------------- |
| **customer_id** | **string**|  | |
| **account_id** | **string**|  | |
| **card_id** | **string**|  | |
| **x_tenant_id** | **string**| Tenant identifier (UUID or domain, e.g. world.test.localhost). Required on every tenant-scoped route. Maps to the tenant whose database serves this request. In production, prefer Host-header-based resolution; X-Tenant-ID is intended for non-production environments and is rejected (HTTP 400) on production hosts. | |

### Return type

[**\MizanCore\BaasSdk\Generated\Model\ManagedCardReadIndex200Response**](../Model/ManagedCardReadIndex200Response.md)

### Authorization

[tenantHeader](../../README.md#tenantHeader), [hmacAuth](../../README.md#hmacAuth), [apiKeyAuth](../../README.md#apiKeyAuth)

### HTTP request headers

- **Content-Type**: Not defined
- **Accept**: `application/json`

[[Back to top]](#) [[Back to API list]](../../README.md#endpoints)
[[Back to Model list]](../../README.md#models)
[[Back to README]](../../README.md)

## `managedCardReadTransactions()`

```php
managedCardReadTransactions($customer_id, $account_id, $card_id, $x_tenant_id, $per_page, $page): \MizanCore\BaasSdk\Generated\Model\ManagedCardReadTransactions200Response
```

List managed card transactions

Returns a paginated transaction history for one of the partner's managed cards, newest first. Money values are in kobo. Managed partners only; requires a granted TRANSACTION_HISTORY consent for the customer (stronger than MANAGE_CARD — reading card spend history is a distinct purpose) + card ownership.

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


$apiInstance = new MizanCore\BaasSdk\Generated\Api\DeveloperPortalManagedCardsApi(
    // If you want use custom http client, pass your client which implements `GuzzleHttp\ClientInterface`.
    // This is optional, `GuzzleHttp\Client` will be used as default.
    new GuzzleHttp\Client(),
    $config
);
$customer_id = 00000000-0000-0000-0000-000000000001; // string
$account_id = 00000000-0000-0000-0000-000000000001; // string
$card_id = 00000000-0000-0000-0000-000000000001; // string
$x_tenant_id = world.test.localhost; // string | Tenant identifier (UUID or domain, e.g. world.test.localhost). Required on every tenant-scoped route. Maps to the tenant whose database serves this request. In production, prefer Host-header-based resolution; X-Tenant-ID is intended for non-production environments and is rejected (HTTP 400) on production hosts.
$per_page = 56; // int | Page size (1–100, default 20).
$page = 56; // int | 1-based page number (default 1).

try {
    $result = $apiInstance->managedCardReadTransactions($customer_id, $account_id, $card_id, $x_tenant_id, $per_page, $page);
    print_r($result);
} catch (Exception $e) {
    echo 'Exception when calling DeveloperPortalManagedCardsApi->managedCardReadTransactions: ', $e->getMessage(), PHP_EOL;
}
```

### Parameters

| Name | Type | Description  | Notes |
| ------------- | ------------- | ------------- | ------------- |
| **customer_id** | **string**|  | |
| **account_id** | **string**|  | |
| **card_id** | **string**|  | |
| **x_tenant_id** | **string**| Tenant identifier (UUID or domain, e.g. world.test.localhost). Required on every tenant-scoped route. Maps to the tenant whose database serves this request. In production, prefer Host-header-based resolution; X-Tenant-ID is intended for non-production environments and is rejected (HTTP 400) on production hosts. | |
| **per_page** | **int**| Page size (1–100, default 20). | [optional] |
| **page** | **int**| 1-based page number (default 1). | [optional] |

### Return type

[**\MizanCore\BaasSdk\Generated\Model\ManagedCardReadTransactions200Response**](../Model/ManagedCardReadTransactions200Response.md)

### Authorization

[tenantHeader](../../README.md#tenantHeader), [hmacAuth](../../README.md#hmacAuth), [apiKeyAuth](../../README.md#apiKeyAuth)

### HTTP request headers

- **Content-Type**: Not defined
- **Accept**: `application/json`

[[Back to top]](#) [[Back to API list]](../../README.md#endpoints)
[[Back to Model list]](../../README.md#models)
[[Back to README]](../../README.md)
