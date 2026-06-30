# MizanCore\BaasSdk\Generated\DeveloperPortalMFAApi

All URIs are relative to https://api.mizancore.ng, except if the operation defines another base path.

| Method | HTTP request | Description |
| ------------- | ------------- | ------------- |
| [**developerAuthMfaSetup()**](DeveloperPortalMFAApi.md#developerAuthMfaSetup) | **POST** /api/v1/developer/auth/mfa/setup | Initiate developer MFA setup |
| [**developerAuthMfaStatus()**](DeveloperPortalMFAApi.md#developerAuthMfaStatus) | **GET** /api/v1/developer/auth/mfa/status | Get developer MFA status |
| [**developerAuthMfaVerify()**](DeveloperPortalMFAApi.md#developerAuthMfaVerify) | **POST** /api/v1/developer/auth/mfa/verify | Verify developer MFA code during login |
| [**developerAuthMfaVerifySetup()**](DeveloperPortalMFAApi.md#developerAuthMfaVerifySetup) | **POST** /api/v1/developer/auth/mfa/verify-setup | Verify developer MFA setup |


## `developerAuthMfaSetup()`

```php
developerAuthMfaSetup($x_tenant_id): \MizanCore\BaasSdk\Generated\Model\WebhookSubscriptionDestroy204Response
```

Initiate developer MFA setup

Generates a TOTP secret and otpauth:// URI for QR code scanning. MFA is NOT active until verifySetup confirms the user can generate valid codes.

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


$apiInstance = new MizanCore\BaasSdk\Generated\Api\DeveloperPortalMFAApi(
    // If you want use custom http client, pass your client which implements `GuzzleHttp\ClientInterface`.
    // This is optional, `GuzzleHttp\Client` will be used as default.
    new GuzzleHttp\Client(),
    $config
);
$x_tenant_id = world.test.localhost; // string | Tenant identifier (UUID or domain, e.g. world.test.localhost). Required on every tenant-scoped route. Maps to the tenant whose database serves this request. In production, prefer Host-header-based resolution; X-Tenant-ID is intended for non-production environments and is rejected (HTTP 400) on production hosts.

try {
    $result = $apiInstance->developerAuthMfaSetup($x_tenant_id);
    print_r($result);
} catch (Exception $e) {
    echo 'Exception when calling DeveloperPortalMFAApi->developerAuthMfaSetup: ', $e->getMessage(), PHP_EOL;
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

## `developerAuthMfaStatus()`

```php
developerAuthMfaStatus($x_tenant_id): \MizanCore\BaasSdk\Generated\Model\WebhookSubscriptionDestroy204Response
```

Get developer MFA status

Returns MFA enrollment status for the authenticated partner user, including whether MFA is enabled, verification date, and remaining backup codes.

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


$apiInstance = new MizanCore\BaasSdk\Generated\Api\DeveloperPortalMFAApi(
    // If you want use custom http client, pass your client which implements `GuzzleHttp\ClientInterface`.
    // This is optional, `GuzzleHttp\Client` will be used as default.
    new GuzzleHttp\Client(),
    $config
);
$x_tenant_id = world.test.localhost; // string | Tenant identifier (UUID or domain, e.g. world.test.localhost). Required on every tenant-scoped route. Maps to the tenant whose database serves this request. In production, prefer Host-header-based resolution; X-Tenant-ID is intended for non-production environments and is rejected (HTTP 400) on production hosts.

try {
    $result = $apiInstance->developerAuthMfaStatus($x_tenant_id);
    print_r($result);
} catch (Exception $e) {
    echo 'Exception when calling DeveloperPortalMFAApi->developerAuthMfaStatus: ', $e->getMessage(), PHP_EOL;
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

## `developerAuthMfaVerify()`

```php
developerAuthMfaVerify($x_tenant_id, $developer_verify_mfa_request): \MizanCore\BaasSdk\Generated\Model\WebhookSubscriptionDestroy204Response
```

Verify developer MFA code during login

Accepts a TOTP code or backup code to complete MFA verification during login. On success, deletes the partial token and issues a full-access token. Rate-limited to prevent brute force.

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


$apiInstance = new MizanCore\BaasSdk\Generated\Api\DeveloperPortalMFAApi(
    // If you want use custom http client, pass your client which implements `GuzzleHttp\ClientInterface`.
    // This is optional, `GuzzleHttp\Client` will be used as default.
    new GuzzleHttp\Client(),
    $config
);
$x_tenant_id = world.test.localhost; // string | Tenant identifier (UUID or domain, e.g. world.test.localhost). Required on every tenant-scoped route. Maps to the tenant whose database serves this request. In production, prefer Host-header-based resolution; X-Tenant-ID is intended for non-production environments and is rejected (HTTP 400) on production hosts.
$developer_verify_mfa_request = {"code":"example"}; // \MizanCore\BaasSdk\Generated\Model\DeveloperVerifyMfaRequest

try {
    $result = $apiInstance->developerAuthMfaVerify($x_tenant_id, $developer_verify_mfa_request);
    print_r($result);
} catch (Exception $e) {
    echo 'Exception when calling DeveloperPortalMFAApi->developerAuthMfaVerify: ', $e->getMessage(), PHP_EOL;
}
```

### Parameters

| Name | Type | Description  | Notes |
| ------------- | ------------- | ------------- | ------------- |
| **x_tenant_id** | **string**| Tenant identifier (UUID or domain, e.g. world.test.localhost). Required on every tenant-scoped route. Maps to the tenant whose database serves this request. In production, prefer Host-header-based resolution; X-Tenant-ID is intended for non-production environments and is rejected (HTTP 400) on production hosts. | |
| **developer_verify_mfa_request** | [**\MizanCore\BaasSdk\Generated\Model\DeveloperVerifyMfaRequest**](../Model/DeveloperVerifyMfaRequest.md)|  | |

### Return type

[**\MizanCore\BaasSdk\Generated\Model\WebhookSubscriptionDestroy204Response**](../Model/WebhookSubscriptionDestroy204Response.md)

### Authorization

[tenantHeader](../../README.md#tenantHeader), [hmacAuth](../../README.md#hmacAuth), [apiKeyAuth](../../README.md#apiKeyAuth)

### HTTP request headers

- **Content-Type**: `application/json`
- **Accept**: `application/json`

[[Back to top]](#) [[Back to API list]](../../README.md#endpoints)
[[Back to Model list]](../../README.md#models)
[[Back to README]](../../README.md)

## `developerAuthMfaVerifySetup()`

```php
developerAuthMfaVerifySetup($x_tenant_id, $developer_verify_mfa_request): \MizanCore\BaasSdk\Generated\Model\WebhookSubscriptionDestroy204Response
```

Verify developer MFA setup

Confirms the user can generate valid TOTP codes, activating MFA. Returns one-time backup codes that must be saved securely.

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


$apiInstance = new MizanCore\BaasSdk\Generated\Api\DeveloperPortalMFAApi(
    // If you want use custom http client, pass your client which implements `GuzzleHttp\ClientInterface`.
    // This is optional, `GuzzleHttp\Client` will be used as default.
    new GuzzleHttp\Client(),
    $config
);
$x_tenant_id = world.test.localhost; // string | Tenant identifier (UUID or domain, e.g. world.test.localhost). Required on every tenant-scoped route. Maps to the tenant whose database serves this request. In production, prefer Host-header-based resolution; X-Tenant-ID is intended for non-production environments and is rejected (HTTP 400) on production hosts.
$developer_verify_mfa_request = {"code":"example"}; // \MizanCore\BaasSdk\Generated\Model\DeveloperVerifyMfaRequest

try {
    $result = $apiInstance->developerAuthMfaVerifySetup($x_tenant_id, $developer_verify_mfa_request);
    print_r($result);
} catch (Exception $e) {
    echo 'Exception when calling DeveloperPortalMFAApi->developerAuthMfaVerifySetup: ', $e->getMessage(), PHP_EOL;
}
```

### Parameters

| Name | Type | Description  | Notes |
| ------------- | ------------- | ------------- | ------------- |
| **x_tenant_id** | **string**| Tenant identifier (UUID or domain, e.g. world.test.localhost). Required on every tenant-scoped route. Maps to the tenant whose database serves this request. In production, prefer Host-header-based resolution; X-Tenant-ID is intended for non-production environments and is rejected (HTTP 400) on production hosts. | |
| **developer_verify_mfa_request** | [**\MizanCore\BaasSdk\Generated\Model\DeveloperVerifyMfaRequest**](../Model/DeveloperVerifyMfaRequest.md)|  | |

### Return type

[**\MizanCore\BaasSdk\Generated\Model\WebhookSubscriptionDestroy204Response**](../Model/WebhookSubscriptionDestroy204Response.md)

### Authorization

[tenantHeader](../../README.md#tenantHeader), [hmacAuth](../../README.md#hmacAuth), [apiKeyAuth](../../README.md#apiKeyAuth)

### HTTP request headers

- **Content-Type**: `application/json`
- **Accept**: `application/json`

[[Back to top]](#) [[Back to API list]](../../README.md#endpoints)
[[Back to Model list]](../../README.md#models)
[[Back to README]](../../README.md)
