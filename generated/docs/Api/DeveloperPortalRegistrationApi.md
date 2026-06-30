# MizanCore\BaasSdk\Generated\DeveloperPortalRegistrationApi

All URIs are relative to https://api.mizancore.ng, except if the operation defines another base path.

| Method | HTTP request | Description |
| ------------- | ------------- | ------------- |
| [**developerRegistrationRegister()**](DeveloperPortalRegistrationApi.md#developerRegistrationRegister) | **POST** /api/v1/developer/register | Register as a developer partner |
| [**developerRegistrationVerifyEmail()**](DeveloperPortalRegistrationApi.md#developerRegistrationVerifyEmail) | **POST** /api/v1/developer/verify-email | Verify developer email address |


## `developerRegistrationRegister()`

```php
developerRegistrationRegister($x_tenant_id, $register_developer_request): \MizanCore\BaasSdk\Generated\Model\DeveloperRegistrationRegister201Response
```

Register as a developer partner

Self-service registration for developers wanting to integrate with the BaaS platform. Creates a partner with pending_approval status.

### Example

```php
<?php
require_once(__DIR__ . '/vendor/autoload.php');



$apiInstance = new MizanCore\BaasSdk\Generated\Api\DeveloperPortalRegistrationApi(
    // If you want use custom http client, pass your client which implements `GuzzleHttp\ClientInterface`.
    // This is optional, `GuzzleHttp\Client` will be used as default.
    new GuzzleHttp\Client()
);
$x_tenant_id = world.test.localhost; // string | Tenant identifier (UUID or domain, e.g. world.test.localhost). Required on every tenant-scoped route. Maps to the tenant whose database serves this request. In production, prefer Host-header-based resolution; X-Tenant-ID is intended for non-production environments and is rejected (HTTP 400) on production hosts.
$register_developer_request = {"company_name":"DC02 Test Partner Ltd","contact_email":"dc02-register-11111111-0000-0000-0000-000000000001@world.test","contact_name":"DC02 Contact","use_case_description":"Slice 8 coverage happy-path registration probe.","website_url":"https://dc02.example.test"}; // \MizanCore\BaasSdk\Generated\Model\RegisterDeveloperRequest

try {
    $result = $apiInstance->developerRegistrationRegister($x_tenant_id, $register_developer_request);
    print_r($result);
} catch (Exception $e) {
    echo 'Exception when calling DeveloperPortalRegistrationApi->developerRegistrationRegister: ', $e->getMessage(), PHP_EOL;
}
```

### Parameters

| Name | Type | Description  | Notes |
| ------------- | ------------- | ------------- | ------------- |
| **x_tenant_id** | **string**| Tenant identifier (UUID or domain, e.g. world.test.localhost). Required on every tenant-scoped route. Maps to the tenant whose database serves this request. In production, prefer Host-header-based resolution; X-Tenant-ID is intended for non-production environments and is rejected (HTTP 400) on production hosts. | |
| **register_developer_request** | [**\MizanCore\BaasSdk\Generated\Model\RegisterDeveloperRequest**](../Model/RegisterDeveloperRequest.md)|  | |

### Return type

[**\MizanCore\BaasSdk\Generated\Model\DeveloperRegistrationRegister201Response**](../Model/DeveloperRegistrationRegister201Response.md)

### Authorization

No authorization required

### HTTP request headers

- **Content-Type**: `application/json`
- **Accept**: `application/json`

[[Back to top]](#) [[Back to API list]](../../README.md#endpoints)
[[Back to Model list]](../../README.md#models)
[[Back to README]](../../README.md)

## `developerRegistrationVerifyEmail()`

```php
developerRegistrationVerifyEmail($x_tenant_id, $verify_developer_email_request): \MizanCore\BaasSdk\Generated\Model\DeveloperRegistrationRegister201Response
```

Verify developer email address

Verifies the developer email address using the token sent during registration.

### Example

```php
<?php
require_once(__DIR__ . '/vendor/autoload.php');



$apiInstance = new MizanCore\BaasSdk\Generated\Api\DeveloperPortalRegistrationApi(
    // If you want use custom http client, pass your client which implements `GuzzleHttp\ClientInterface`.
    // This is optional, `GuzzleHttp\Client` will be used as default.
    new GuzzleHttp\Client()
);
$x_tenant_id = world.test.localhost; // string | Tenant identifier (UUID or domain, e.g. world.test.localhost). Required on every tenant-scoped route. Maps to the tenant whose database serves this request. In production, prefer Host-header-based resolution; X-Tenant-ID is intended for non-production environments and is rejected (HTTP 400) on production hosts.
$verify_developer_email_request = {"token":"0000000000000000000000000000000000000000000000000000000000000001","email":"cq01-probe@example.com"}; // \MizanCore\BaasSdk\Generated\Model\VerifyDeveloperEmailRequest

try {
    $result = $apiInstance->developerRegistrationVerifyEmail($x_tenant_id, $verify_developer_email_request);
    print_r($result);
} catch (Exception $e) {
    echo 'Exception when calling DeveloperPortalRegistrationApi->developerRegistrationVerifyEmail: ', $e->getMessage(), PHP_EOL;
}
```

### Parameters

| Name | Type | Description  | Notes |
| ------------- | ------------- | ------------- | ------------- |
| **x_tenant_id** | **string**| Tenant identifier (UUID or domain, e.g. world.test.localhost). Required on every tenant-scoped route. Maps to the tenant whose database serves this request. In production, prefer Host-header-based resolution; X-Tenant-ID is intended for non-production environments and is rejected (HTTP 400) on production hosts. | |
| **verify_developer_email_request** | [**\MizanCore\BaasSdk\Generated\Model\VerifyDeveloperEmailRequest**](../Model/VerifyDeveloperEmailRequest.md)|  | |

### Return type

[**\MizanCore\BaasSdk\Generated\Model\DeveloperRegistrationRegister201Response**](../Model/DeveloperRegistrationRegister201Response.md)

### Authorization

No authorization required

### HTTP request headers

- **Content-Type**: `application/json`
- **Accept**: `application/json`

[[Back to top]](#) [[Back to API list]](../../README.md#endpoints)
[[Back to Model list]](../../README.md#models)
[[Back to README]](../../README.md)
