# MizanCore\BaasSdk\Generated\DeveloperPortalAuthenticationApi

All URIs are relative to https://api.mizancore.ng, except if the operation defines another base path.

| Method | HTTP request | Description |
| ------------- | ------------- | ------------- |
| [**developerAuthLogin()**](DeveloperPortalAuthenticationApi.md#developerAuthLogin) | **POST** /api/v1/developer/auth/login | Developer login |
| [**developerAuthLogout()**](DeveloperPortalAuthenticationApi.md#developerAuthLogout) | **POST** /api/v1/developer/auth/logout | Developer logout |
| [**developerAuthMe()**](DeveloperPortalAuthenticationApi.md#developerAuthMe) | **GET** /api/v1/developer/auth/me | Get current developer profile |


## `developerAuthLogin()`

```php
developerAuthLogin($x_tenant_id, $developer_login_request): \MizanCore\BaasSdk\Generated\Model\VirtualAccountQueryIndex200Response
```

Developer login

Authenticates a partner user with email and password, returning a Bearer token. If MFA is enabled, a partial token (mfa:verify ability) is issued and the client must complete MFA verification to obtain a full-access token.

### Example

```php
<?php
require_once(__DIR__ . '/vendor/autoload.php');



$apiInstance = new MizanCore\BaasSdk\Generated\Api\DeveloperPortalAuthenticationApi(
    // If you want use custom http client, pass your client which implements `GuzzleHttp\ClientInterface`.
    // This is optional, `GuzzleHttp\Client` will be used as default.
    new GuzzleHttp\Client()
);
$x_tenant_id = world.test.localhost; // string | Tenant identifier (UUID or domain, e.g. world.test.localhost). Required on every tenant-scoped route. Maps to the tenant whose database serves this request. In production, prefer Host-header-based resolution; X-Tenant-ID is intended for non-production environments and is rejected (HTTP 400) on production hosts.
$developer_login_request = {"email":"alice@world.test","password":"example"}; // \MizanCore\BaasSdk\Generated\Model\DeveloperLoginRequest

try {
    $result = $apiInstance->developerAuthLogin($x_tenant_id, $developer_login_request);
    print_r($result);
} catch (Exception $e) {
    echo 'Exception when calling DeveloperPortalAuthenticationApi->developerAuthLogin: ', $e->getMessage(), PHP_EOL;
}
```

### Parameters

| Name | Type | Description  | Notes |
| ------------- | ------------- | ------------- | ------------- |
| **x_tenant_id** | **string**| Tenant identifier (UUID or domain, e.g. world.test.localhost). Required on every tenant-scoped route. Maps to the tenant whose database serves this request. In production, prefer Host-header-based resolution; X-Tenant-ID is intended for non-production environments and is rejected (HTTP 400) on production hosts. | |
| **developer_login_request** | [**\MizanCore\BaasSdk\Generated\Model\DeveloperLoginRequest**](../Model/DeveloperLoginRequest.md)|  | |

### Return type

[**\MizanCore\BaasSdk\Generated\Model\VirtualAccountQueryIndex200Response**](../Model/VirtualAccountQueryIndex200Response.md)

### Authorization

No authorization required

### HTTP request headers

- **Content-Type**: `application/json`
- **Accept**: `application/json`

[[Back to top]](#) [[Back to API list]](../../README.md#endpoints)
[[Back to Model list]](../../README.md#models)
[[Back to README]](../../README.md)

## `developerAuthLogout()`

```php
developerAuthLogout($x_tenant_id): \MizanCore\BaasSdk\Generated\Model\VirtualAccountQueryIndex200Response
```

Developer logout

Revokes all API tokens for the authenticated partner user, ending the session.

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


$apiInstance = new MizanCore\BaasSdk\Generated\Api\DeveloperPortalAuthenticationApi(
    // If you want use custom http client, pass your client which implements `GuzzleHttp\ClientInterface`.
    // This is optional, `GuzzleHttp\Client` will be used as default.
    new GuzzleHttp\Client(),
    $config
);
$x_tenant_id = world.test.localhost; // string | Tenant identifier (UUID or domain, e.g. world.test.localhost). Required on every tenant-scoped route. Maps to the tenant whose database serves this request. In production, prefer Host-header-based resolution; X-Tenant-ID is intended for non-production environments and is rejected (HTTP 400) on production hosts.

try {
    $result = $apiInstance->developerAuthLogout($x_tenant_id);
    print_r($result);
} catch (Exception $e) {
    echo 'Exception when calling DeveloperPortalAuthenticationApi->developerAuthLogout: ', $e->getMessage(), PHP_EOL;
}
```

### Parameters

| Name | Type | Description  | Notes |
| ------------- | ------------- | ------------- | ------------- |
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

## `developerAuthMe()`

```php
developerAuthMe($x_tenant_id): \MizanCore\BaasSdk\Generated\Model\VirtualAccountQueryIndex200Response
```

Get current developer profile

Returns the profile of the currently authenticated partner user.

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


$apiInstance = new MizanCore\BaasSdk\Generated\Api\DeveloperPortalAuthenticationApi(
    // If you want use custom http client, pass your client which implements `GuzzleHttp\ClientInterface`.
    // This is optional, `GuzzleHttp\Client` will be used as default.
    new GuzzleHttp\Client(),
    $config
);
$x_tenant_id = world.test.localhost; // string | Tenant identifier (UUID or domain, e.g. world.test.localhost). Required on every tenant-scoped route. Maps to the tenant whose database serves this request. In production, prefer Host-header-based resolution; X-Tenant-ID is intended for non-production environments and is rejected (HTTP 400) on production hosts.

try {
    $result = $apiInstance->developerAuthMe($x_tenant_id);
    print_r($result);
} catch (Exception $e) {
    echo 'Exception when calling DeveloperPortalAuthenticationApi->developerAuthMe: ', $e->getMessage(), PHP_EOL;
}
```

### Parameters

| Name | Type | Description  | Notes |
| ------------- | ------------- | ------------- | ------------- |
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
