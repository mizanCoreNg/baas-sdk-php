# MizanBaasGenerated

Banking-as-a-Service API for external fintech partners.


## Installation & Usage

### Requirements

PHP 7.4 and later.
Should also work with PHP 8.0.

### Composer

To install the bindings via [Composer](https://getcomposer.org/), add the following to `composer.json`:

```json
{
  "repositories": [
    {
      "type": "vcs",
      "url": "https://github.com/GIT_USER_ID/GIT_REPO_ID.git"
    }
  ],
  "require": {
    "GIT_USER_ID/GIT_REPO_ID": "*@dev"
  }
}
```

Then run `composer install`

### Manual Installation

Download the files and include `autoload.php`:

```php
<?php
require_once('/path/to/MizanBaasGenerated/vendor/autoload.php');
```

## Getting Started

Please follow the [installation procedure](#installation--usage) and then run the following:

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


$apiInstance = new MizanCore\BaasSdk\Generated\Api\BaaSBalanceApi(
    // If you want use custom http client, pass your client which implements `GuzzleHttp\ClientInterface`.
    // This is optional, `GuzzleHttp\Client` will be used as default.
    new GuzzleHttp\Client(),
    $config
);
$x_tenant_id = world.test.localhost; // string | Tenant identifier (UUID or domain, e.g. world.test.localhost). Required on every tenant-scoped route. Maps to the tenant whose database serves this request. In production, prefer Host-header-based resolution; X-Tenant-ID is intended for non-production environments and is rejected (HTTP 400) on production hosts.

try {
    $result = $apiInstance->baasBalanceBalance($x_tenant_id);
    print_r($result);
} catch (Exception $e) {
    echo 'Exception when calling BaaSBalanceApi->baasBalanceBalance: ', $e->getMessage(), PHP_EOL;
}

```

## API Endpoints

All URIs are relative to *https://api.mizancore.ng*

Class | Method | HTTP request | Description
------------ | ------------- | ------------- | -------------
*BaaSBalanceApi* | [**baasBalanceBalance**](docs/Api/BaaSBalanceApi.md#baasbalancebalance) | **GET** /api/v1/baas/balance | Get settlement account balance
*BaaSBalanceApi* | [**baasBalanceFeePreview**](docs/Api/BaaSBalanceApi.md#baasbalancefeepreview) | **POST** /api/v1/baas/withdrawals/fee-preview | Preview withdrawal fee
*BaaSBalanceApi* | [**developerWithdrawalsFeePreview**](docs/Api/BaaSBalanceApi.md#developerwithdrawalsfeepreview) | **POST** /api/v1/developer/withdrawals/fee-preview | Preview withdrawal fee
*BaaSTransactionsApi* | [**developerTransactionsIndex**](docs/Api/BaaSTransactionsApi.md#developertransactionsindex) | **GET** /api/v1/developer/transactions | List partner transactions
*BaaSTransactionsApi* | [**developerTransactionsShow**](docs/Api/BaaSTransactionsApi.md#developertransactionsshow) | **GET** /api/v1/developer/transactions/{id} | Get transaction details
*BaaSTransactionsApi* | [**partnerTransactionIndex**](docs/Api/BaaSTransactionsApi.md#partnertransactionindex) | **GET** /api/v1/baas/transactions | List partner transactions
*BaaSTransactionsApi* | [**partnerTransactionShow**](docs/Api/BaaSTransactionsApi.md#partnertransactionshow) | **GET** /api/v1/baas/transactions/{id} | Get transaction details
*BaaSVirtualAccountsApi* | [**developerVirtualAccountsClose**](docs/Api/BaaSVirtualAccountsApi.md#developervirtualaccountsclose) | **POST** /api/v1/developer/virtual-accounts/{id}/close | Close a virtual account
*BaaSVirtualAccountsApi* | [**developerVirtualAccountsCreate**](docs/Api/BaaSVirtualAccountsApi.md#developervirtualaccountscreate) | **POST** /api/v1/developer/virtual-accounts | Create a virtual account
*BaaSVirtualAccountsApi* | [**developerVirtualAccountsIndex**](docs/Api/BaaSVirtualAccountsApi.md#developervirtualaccountsindex) | **GET** /api/v1/developer/virtual-accounts | List virtual accounts
*BaaSVirtualAccountsApi* | [**developerVirtualAccountsLookup**](docs/Api/BaaSVirtualAccountsApi.md#developervirtualaccountslookup) | **GET** /api/v1/developer/virtual-accounts/lookup | Find virtual account by customer reference
*BaaSVirtualAccountsApi* | [**developerVirtualAccountsShow**](docs/Api/BaaSVirtualAccountsApi.md#developervirtualaccountsshow) | **GET** /api/v1/developer/virtual-accounts/{id} | Get virtual account details
*BaaSVirtualAccountsApi* | [**virtualAccountClose**](docs/Api/BaaSVirtualAccountsApi.md#virtualaccountclose) | **POST** /api/v1/baas/virtual-accounts/{id}/close | Close a virtual account
*BaaSVirtualAccountsApi* | [**virtualAccountCreate**](docs/Api/BaaSVirtualAccountsApi.md#virtualaccountcreate) | **POST** /api/v1/baas/virtual-accounts | Create a virtual account
*BaaSVirtualAccountsApi* | [**virtualAccountQueryFindByReference**](docs/Api/BaaSVirtualAccountsApi.md#virtualaccountqueryfindbyreference) | **GET** /api/v1/baas/virtual-accounts/lookup | Find virtual account by customer reference
*BaaSVirtualAccountsApi* | [**virtualAccountQueryIndex**](docs/Api/BaaSVirtualAccountsApi.md#virtualaccountqueryindex) | **GET** /api/v1/baas/virtual-accounts | List virtual accounts
*BaaSVirtualAccountsApi* | [**virtualAccountQueryShow**](docs/Api/BaaSVirtualAccountsApi.md#virtualaccountqueryshow) | **GET** /api/v1/baas/virtual-accounts/{id} | Get virtual account details
*BaaSWalletApi* | [**developerWalletBalance**](docs/Api/BaaSWalletApi.md#developerwalletbalance) | **GET** /api/v1/developer/wallet/balance | Get wallet balance
*BaaSWalletApi* | [**developerWalletTransactions**](docs/Api/BaaSWalletApi.md#developerwallettransactions) | **GET** /api/v1/developer/wallet/transactions | List wallet transactions
*BaaSWalletApi* | [**partnerWalletBalance**](docs/Api/BaaSWalletApi.md#partnerwalletbalance) | **GET** /api/v1/baas/wallet/balance | Get wallet balance
*BaaSWalletApi* | [**partnerWalletTransactions**](docs/Api/BaaSWalletApi.md#partnerwallettransactions) | **GET** /api/v1/baas/wallet/transactions | List wallet transactions
*BaaSWebhooksApi* | [**developerWebhooksDeliveries**](docs/Api/BaaSWebhooksApi.md#developerwebhooksdeliveries) | **GET** /api/v1/developer/webhooks/{id}/deliveries | List webhook deliveries
*BaaSWebhooksApi* | [**developerWebhooksDestroy**](docs/Api/BaaSWebhooksApi.md#developerwebhooksdestroy) | **DELETE** /api/v1/developer/webhooks/{id} | Deactivate a webhook subscription
*BaaSWebhooksApi* | [**developerWebhooksIndex**](docs/Api/BaaSWebhooksApi.md#developerwebhooksindex) | **GET** /api/v1/developer/webhooks | List webhook subscriptions
*BaaSWebhooksApi* | [**developerWebhooksRotateSecret**](docs/Api/BaaSWebhooksApi.md#developerwebhooksrotatesecret) | **POST** /api/v1/developer/webhooks/{id}/rotate-secret | Rotate webhook secret
*BaaSWebhooksApi* | [**developerWebhooksShow**](docs/Api/BaaSWebhooksApi.md#developerwebhooksshow) | **GET** /api/v1/developer/webhooks/{id} | Get webhook subscription details
*BaaSWebhooksApi* | [**developerWebhooksStore**](docs/Api/BaaSWebhooksApi.md#developerwebhooksstore) | **POST** /api/v1/developer/webhooks | Create a webhook subscription
*BaaSWebhooksApi* | [**developerWebhooksTest**](docs/Api/BaaSWebhooksApi.md#developerwebhookstest) | **POST** /api/v1/developer/webhooks/{id}/test | Send a test webhook
*BaaSWebhooksApi* | [**developerWebhooksUpdate**](docs/Api/BaaSWebhooksApi.md#developerwebhooksupdate) | **PUT** /api/v1/developer/webhooks/{id} | Update a webhook subscription
*BaaSWebhooksApi* | [**webhookSubscriptionDestroy**](docs/Api/BaaSWebhooksApi.md#webhooksubscriptiondestroy) | **DELETE** /api/v1/baas/webhooks/{id} | Deactivate a webhook subscription
*BaaSWebhooksApi* | [**webhookSubscriptionIndex**](docs/Api/BaaSWebhooksApi.md#webhooksubscriptionindex) | **GET** /api/v1/baas/webhooks | List webhook subscriptions
*BaaSWebhooksApi* | [**webhookSubscriptionOperationsDeliveries**](docs/Api/BaaSWebhooksApi.md#webhooksubscriptionoperationsdeliveries) | **GET** /api/v1/baas/webhooks/{id}/deliveries | List webhook deliveries
*BaaSWebhooksApi* | [**webhookSubscriptionOperationsRotateSecret**](docs/Api/BaaSWebhooksApi.md#webhooksubscriptionoperationsrotatesecret) | **POST** /api/v1/baas/webhooks/{id}/rotate-secret | Rotate webhook secret
*BaaSWebhooksApi* | [**webhookSubscriptionOperationsTest**](docs/Api/BaaSWebhooksApi.md#webhooksubscriptionoperationstest) | **POST** /api/v1/baas/webhooks/{id}/test | Send a test webhook
*BaaSWebhooksApi* | [**webhookSubscriptionShow**](docs/Api/BaaSWebhooksApi.md#webhooksubscriptionshow) | **GET** /api/v1/baas/webhooks/{id} | Get webhook subscription details
*BaaSWebhooksApi* | [**webhookSubscriptionStore**](docs/Api/BaaSWebhooksApi.md#webhooksubscriptionstore) | **POST** /api/v1/baas/webhooks | Create a webhook subscription
*BaaSWebhooksApi* | [**webhookSubscriptionUpdate**](docs/Api/BaaSWebhooksApi.md#webhooksubscriptionupdate) | **PUT** /api/v1/baas/webhooks/{id} | Update a webhook subscription
*BaaSWithdrawalsApi* | [**baasWithdrawalIndex**](docs/Api/BaaSWithdrawalsApi.md#baaswithdrawalindex) | **GET** /api/v1/baas/withdrawals | List withdrawal transactions
*BaaSWithdrawalsApi* | [**baasWithdrawalShow**](docs/Api/BaaSWithdrawalsApi.md#baaswithdrawalshow) | **GET** /api/v1/baas/withdrawals/{id} | Get withdrawal details
*BaaSWithdrawalsApi* | [**baasWithdrawalStore**](docs/Api/BaaSWithdrawalsApi.md#baaswithdrawalstore) | **POST** /api/v1/baas/withdrawals | Initiate a withdrawal
*BaaSWithdrawalsApi* | [**developerWithdrawalsIndex**](docs/Api/BaaSWithdrawalsApi.md#developerwithdrawalsindex) | **GET** /api/v1/developer/withdrawals | List withdrawal transactions
*BaaSWithdrawalsApi* | [**developerWithdrawalsShow**](docs/Api/BaaSWithdrawalsApi.md#developerwithdrawalsshow) | **GET** /api/v1/developer/withdrawals/{id} | Get withdrawal details
*BaaSWithdrawalsApi* | [**developerWithdrawalsStore**](docs/Api/BaaSWithdrawalsApi.md#developerwithdrawalsstore) | **POST** /api/v1/developer/withdrawals | Initiate a withdrawal
*DeveloperPortalAPIKeysApi* | [**developerApiKeyIndex**](docs/Api/DeveloperPortalAPIKeysApi.md#developerapikeyindex) | **GET** /api/v1/developer/api-keys | List API keys
*DeveloperPortalAPIKeysApi* | [**developerApiKeyRevoke**](docs/Api/DeveloperPortalAPIKeysApi.md#developerapikeyrevoke) | **POST** /api/v1/developer/api-keys/{id}/revoke | Revoke an API key
*DeveloperPortalAPIKeysApi* | [**developerApiKeyRotate**](docs/Api/DeveloperPortalAPIKeysApi.md#developerapikeyrotate) | **POST** /api/v1/developer/api-keys/{id}/rotate | Rotate an API key
*DeveloperPortalAPIKeysApi* | [**developerApiKeyStore**](docs/Api/DeveloperPortalAPIKeysApi.md#developerapikeystore) | **POST** /api/v1/developer/api-keys | Create a new API key
*DeveloperPortalAuthenticationApi* | [**developerAuthLogin**](docs/Api/DeveloperPortalAuthenticationApi.md#developerauthlogin) | **POST** /api/v1/developer/auth/login | Developer login
*DeveloperPortalAuthenticationApi* | [**developerAuthLogout**](docs/Api/DeveloperPortalAuthenticationApi.md#developerauthlogout) | **POST** /api/v1/developer/auth/logout | Developer logout
*DeveloperPortalAuthenticationApi* | [**developerAuthMe**](docs/Api/DeveloperPortalAuthenticationApi.md#developerauthme) | **GET** /api/v1/developer/auth/me | Get current developer profile
*DeveloperPortalConsentsApi* | [**developerConsentsExport**](docs/Api/DeveloperPortalConsentsApi.md#developerconsentsexport) | **GET** /api/v1/developer/consents/export | Export consent register
*DeveloperPortalConsentsApi* | [**developerConsentsIndex**](docs/Api/DeveloperPortalConsentsApi.md#developerconsentsindex) | **GET** /api/v1/developer/consents | List consent register
*DeveloperPortalConsentsApi* | [**developerConsentsRecord**](docs/Api/DeveloperPortalConsentsApi.md#developerconsentsrecord) | **POST** /api/v1/developer/consents | Record a consent attestation
*DeveloperPortalConsentsApi* | [**developerConsentsRevoke**](docs/Api/DeveloperPortalConsentsApi.md#developerconsentsrevoke) | **POST** /api/v1/developer/consents/{id}/revoke | Revoke a consent
*DeveloperPortalConsentsApi* | [**developerConsentsShow**](docs/Api/DeveloperPortalConsentsApi.md#developerconsentsshow) | **GET** /api/v1/developer/consents/{id} | Show a consent record
*DeveloperPortalConsentsApi* | [**partnerConsentExport**](docs/Api/DeveloperPortalConsentsApi.md#partnerconsentexport) | **GET** /api/v1/baas/consents/export | Export consent register
*DeveloperPortalConsentsApi* | [**partnerConsentIndex**](docs/Api/DeveloperPortalConsentsApi.md#partnerconsentindex) | **GET** /api/v1/baas/consents | List consent register
*DeveloperPortalConsentsApi* | [**partnerConsentRecord**](docs/Api/DeveloperPortalConsentsApi.md#partnerconsentrecord) | **POST** /api/v1/baas/consents | Record a consent attestation
*DeveloperPortalConsentsApi* | [**partnerConsentRevoke**](docs/Api/DeveloperPortalConsentsApi.md#partnerconsentrevoke) | **POST** /api/v1/baas/consents/{id}/revoke | Revoke a consent
*DeveloperPortalConsentsApi* | [**partnerConsentShow**](docs/Api/DeveloperPortalConsentsApi.md#partnerconsentshow) | **GET** /api/v1/baas/consents/{id} | Show a consent record
*DeveloperPortalKYBApi* | [**developerKybBusiness**](docs/Api/DeveloperPortalKYBApi.md#developerkybbusiness) | **PUT** /api/v1/developer/kyb/business | Update KYB business info
*DeveloperPortalKYBApi* | [**developerKybDocumentsUpload**](docs/Api/DeveloperPortalKYBApi.md#developerkybdocumentsupload) | **POST** /api/v1/developer/kyb/documents | Upload a KYB document
*DeveloperPortalKYBApi* | [**developerKybOfficersAdd**](docs/Api/DeveloperPortalKYBApi.md#developerkybofficersadd) | **POST** /api/v1/developer/kyb/officers | Add a KYB officer
*DeveloperPortalKYBApi* | [**developerKybOfficersRemove**](docs/Api/DeveloperPortalKYBApi.md#developerkybofficersremove) | **DELETE** /api/v1/developer/kyb/officers/{id} | Remove a KYB officer
*DeveloperPortalKYBApi* | [**developerKybOfficersUpdate**](docs/Api/DeveloperPortalKYBApi.md#developerkybofficersupdate) | **PATCH** /api/v1/developer/kyb/officers/{id} | Update a KYB officer
*DeveloperPortalKYBApi* | [**developerKybShow**](docs/Api/DeveloperPortalKYBApi.md#developerkybshow) | **GET** /api/v1/developer/kyb | Get KYB submission
*DeveloperPortalKYBApi* | [**developerKybSubmit**](docs/Api/DeveloperPortalKYBApi.md#developerkybsubmit) | **POST** /api/v1/developer/kyb/submit | Submit KYB for review
*DeveloperPortalMFAApi* | [**developerAuthMfaSetup**](docs/Api/DeveloperPortalMFAApi.md#developerauthmfasetup) | **POST** /api/v1/developer/auth/mfa/setup | Initiate developer MFA setup
*DeveloperPortalMFAApi* | [**developerAuthMfaStatus**](docs/Api/DeveloperPortalMFAApi.md#developerauthmfastatus) | **GET** /api/v1/developer/auth/mfa/status | Get developer MFA status
*DeveloperPortalMFAApi* | [**developerAuthMfaVerify**](docs/Api/DeveloperPortalMFAApi.md#developerauthmfaverify) | **POST** /api/v1/developer/auth/mfa/verify | Verify developer MFA code during login
*DeveloperPortalMFAApi* | [**developerAuthMfaVerifySetup**](docs/Api/DeveloperPortalMFAApi.md#developerauthmfaverifysetup) | **POST** /api/v1/developer/auth/mfa/verify-setup | Verify developer MFA setup
*DeveloperPortalManagedAccountsApi* | [**developerAccountsIndex**](docs/Api/DeveloperPortalManagedAccountsApi.md#developeraccountsindex) | **GET** /api/v1/developer/accounts | List all managed accounts
*DeveloperPortalManagedAccountsApi* | [**developerCustomersAccountsIndex**](docs/Api/DeveloperPortalManagedAccountsApi.md#developercustomersaccountsindex) | **GET** /api/v1/developer/customers/{customerId}/accounts | List a customer&#39;s managed accounts
*DeveloperPortalManagedAccountsApi* | [**developerCustomersAccountsStore**](docs/Api/DeveloperPortalManagedAccountsApi.md#developercustomersaccountsstore) | **POST** /api/v1/developer/customers/{customerId}/accounts | Open a managed account
*DeveloperPortalManagedAccountsApi* | [**managedAccountIndex**](docs/Api/DeveloperPortalManagedAccountsApi.md#managedaccountindex) | **GET** /api/v1/baas/customers/{customerId}/accounts | List a customer&#39;s managed accounts
*DeveloperPortalManagedAccountsApi* | [**managedAccountStore**](docs/Api/DeveloperPortalManagedAccountsApi.md#managedaccountstore) | **POST** /api/v1/baas/customers/{customerId}/accounts | Open a managed account
*DeveloperPortalManagedCardsApi* | [**developerCustomersAccountsCardsFreeze**](docs/Api/DeveloperPortalManagedCardsApi.md#developercustomersaccountscardsfreeze) | **POST** /api/v1/developer/customers/{customerId}/accounts/{accountId}/cards/{cardId}/freeze | Freeze a managed card
*DeveloperPortalManagedCardsApi* | [**developerCustomersAccountsCardsIndex**](docs/Api/DeveloperPortalManagedCardsApi.md#developercustomersaccountscardsindex) | **GET** /api/v1/developer/customers/{customerId}/accounts/{accountId}/cards | List managed cards for an account
*DeveloperPortalManagedCardsApi* | [**developerCustomersAccountsCardsIssue**](docs/Api/DeveloperPortalManagedCardsApi.md#developercustomersaccountscardsissue) | **POST** /api/v1/developer/customers/{customerId}/accounts/{accountId}/cards | Issue a managed virtual card
*DeveloperPortalManagedCardsApi* | [**developerCustomersAccountsCardsLimits**](docs/Api/DeveloperPortalManagedCardsApi.md#developercustomersaccountscardslimits) | **PUT** /api/v1/developer/customers/{customerId}/accounts/{accountId}/cards/{cardId}/limits | Set managed card spending limits
*DeveloperPortalManagedCardsApi* | [**developerCustomersAccountsCardsPin**](docs/Api/DeveloperPortalManagedCardsApi.md#developercustomersaccountscardspin) | **POST** /api/v1/developer/customers/{customerId}/accounts/{accountId}/cards/{cardId}/pin | Set or change a managed card PIN
*DeveloperPortalManagedCardsApi* | [**developerCustomersAccountsCardsShow**](docs/Api/DeveloperPortalManagedCardsApi.md#developercustomersaccountscardsshow) | **GET** /api/v1/developer/customers/{customerId}/accounts/{accountId}/cards/{cardId} | Show a managed card
*DeveloperPortalManagedCardsApi* | [**developerCustomersAccountsCardsTerminate**](docs/Api/DeveloperPortalManagedCardsApi.md#developercustomersaccountscardsterminate) | **POST** /api/v1/developer/customers/{customerId}/accounts/{accountId}/cards/{cardId}/terminate | Terminate a managed card
*DeveloperPortalManagedCardsApi* | [**developerCustomersAccountsCardsTransactions**](docs/Api/DeveloperPortalManagedCardsApi.md#developercustomersaccountscardstransactions) | **GET** /api/v1/developer/customers/{customerId}/accounts/{accountId}/cards/{cardId}/transactions | List managed card transactions
*DeveloperPortalManagedCardsApi* | [**developerCustomersAccountsCardsUnfreeze**](docs/Api/DeveloperPortalManagedCardsApi.md#developercustomersaccountscardsunfreeze) | **POST** /api/v1/developer/customers/{customerId}/accounts/{accountId}/cards/{cardId}/unfreeze | Unfreeze a managed card
*DeveloperPortalManagedCardsApi* | [**managedCardIssue**](docs/Api/DeveloperPortalManagedCardsApi.md#managedcardissue) | **POST** /api/v1/baas/customers/{customerId}/accounts/{accountId}/cards | Issue a managed virtual card
*DeveloperPortalManagedCardsApi* | [**managedCardLifecycleFreeze**](docs/Api/DeveloperPortalManagedCardsApi.md#managedcardlifecyclefreeze) | **POST** /api/v1/baas/customers/{customerId}/accounts/{accountId}/cards/{cardId}/freeze | Freeze a managed card
*DeveloperPortalManagedCardsApi* | [**managedCardLifecycleSetLimits**](docs/Api/DeveloperPortalManagedCardsApi.md#managedcardlifecyclesetlimits) | **PUT** /api/v1/baas/customers/{customerId}/accounts/{accountId}/cards/{cardId}/limits | Set managed card spending limits
*DeveloperPortalManagedCardsApi* | [**managedCardLifecycleSetPin**](docs/Api/DeveloperPortalManagedCardsApi.md#managedcardlifecyclesetpin) | **POST** /api/v1/baas/customers/{customerId}/accounts/{accountId}/cards/{cardId}/pin | Set or change a managed card PIN
*DeveloperPortalManagedCardsApi* | [**managedCardLifecycleTerminate**](docs/Api/DeveloperPortalManagedCardsApi.md#managedcardlifecycleterminate) | **POST** /api/v1/baas/customers/{customerId}/accounts/{accountId}/cards/{cardId}/terminate | Terminate a managed card
*DeveloperPortalManagedCardsApi* | [**managedCardLifecycleUnfreeze**](docs/Api/DeveloperPortalManagedCardsApi.md#managedcardlifecycleunfreeze) | **POST** /api/v1/baas/customers/{customerId}/accounts/{accountId}/cards/{cardId}/unfreeze | Unfreeze a managed card
*DeveloperPortalManagedCardsApi* | [**managedCardReadIndex**](docs/Api/DeveloperPortalManagedCardsApi.md#managedcardreadindex) | **GET** /api/v1/baas/customers/{customerId}/accounts/{accountId}/cards | List managed cards for an account
*DeveloperPortalManagedCardsApi* | [**managedCardReadShow**](docs/Api/DeveloperPortalManagedCardsApi.md#managedcardreadshow) | **GET** /api/v1/baas/customers/{customerId}/accounts/{accountId}/cards/{cardId} | Show a managed card
*DeveloperPortalManagedCardsApi* | [**managedCardReadTransactions**](docs/Api/DeveloperPortalManagedCardsApi.md#managedcardreadtransactions) | **GET** /api/v1/baas/customers/{customerId}/accounts/{accountId}/cards/{cardId}/transactions | List managed card transactions
*DeveloperPortalManagedCustomersApi* | [**developerCustomersIndex**](docs/Api/DeveloperPortalManagedCustomersApi.md#developercustomersindex) | **GET** /api/v1/developer/customers | List managed customers
*DeveloperPortalManagedCustomersApi* | [**developerCustomersOffboard**](docs/Api/DeveloperPortalManagedCustomersApi.md#developercustomersoffboard) | **POST** /api/v1/developer/customers/{customerId}/offboard | Offboard a managed customer
*DeveloperPortalManagedCustomersApi* | [**developerCustomersReactivate**](docs/Api/DeveloperPortalManagedCustomersApi.md#developercustomersreactivate) | **POST** /api/v1/developer/customers/{customerId}/reactivate | Reactivate a managed customer
*DeveloperPortalManagedCustomersApi* | [**developerCustomersShow**](docs/Api/DeveloperPortalManagedCustomersApi.md#developercustomersshow) | **GET** /api/v1/developer/customers/{id} | Show a managed customer
*DeveloperPortalManagedCustomersApi* | [**developerCustomersStore**](docs/Api/DeveloperPortalManagedCustomersApi.md#developercustomersstore) | **POST** /api/v1/developer/customers | Onboard a managed customer
*DeveloperPortalManagedCustomersApi* | [**developerCustomersSuspend**](docs/Api/DeveloperPortalManagedCustomersApi.md#developercustomerssuspend) | **POST** /api/v1/developer/customers/{customerId}/suspend | Suspend a managed customer
*DeveloperPortalManagedCustomersApi* | [**managedCustomerIndex**](docs/Api/DeveloperPortalManagedCustomersApi.md#managedcustomerindex) | **GET** /api/v1/baas/customers | List managed customers
*DeveloperPortalManagedCustomersApi* | [**managedCustomerLifecycleOffboard**](docs/Api/DeveloperPortalManagedCustomersApi.md#managedcustomerlifecycleoffboard) | **POST** /api/v1/baas/customers/{customerId}/offboard | Offboard a managed customer
*DeveloperPortalManagedCustomersApi* | [**managedCustomerLifecycleReactivate**](docs/Api/DeveloperPortalManagedCustomersApi.md#managedcustomerlifecyclereactivate) | **POST** /api/v1/baas/customers/{customerId}/reactivate | Reactivate a managed customer
*DeveloperPortalManagedCustomersApi* | [**managedCustomerLifecycleSuspend**](docs/Api/DeveloperPortalManagedCustomersApi.md#managedcustomerlifecyclesuspend) | **POST** /api/v1/baas/customers/{customerId}/suspend | Suspend a managed customer
*DeveloperPortalManagedCustomersApi* | [**managedCustomerShow**](docs/Api/DeveloperPortalManagedCustomersApi.md#managedcustomershow) | **GET** /api/v1/baas/customers/{id} | Show a managed customer
*DeveloperPortalManagedCustomersApi* | [**managedCustomerStore**](docs/Api/DeveloperPortalManagedCustomersApi.md#managedcustomerstore) | **POST** /api/v1/baas/customers | Onboard a managed customer
*DeveloperPortalManagedStatementsApi* | [**developerAccountsStatement**](docs/Api/DeveloperPortalManagedStatementsApi.md#developeraccountsstatement) | **GET** /api/v1/developer/accounts/{accountId}/statement | Get a managed customer account statement
*DeveloperPortalManagedStatementsApi* | [**managedCustomerStatementShow**](docs/Api/DeveloperPortalManagedStatementsApi.md#managedcustomerstatementshow) | **GET** /api/v1/baas/accounts/{accountId}/statement | Get a managed customer account statement
*DeveloperPortalRegistrationApi* | [**developerRegistrationRegister**](docs/Api/DeveloperPortalRegistrationApi.md#developerregistrationregister) | **POST** /api/v1/developer/register | Register as a developer partner
*DeveloperPortalRegistrationApi* | [**developerRegistrationVerifyEmail**](docs/Api/DeveloperPortalRegistrationApi.md#developerregistrationverifyemail) | **POST** /api/v1/developer/verify-email | Verify developer email address
*DeveloperPortalSandboxApi* | [**developerSandboxReset**](docs/Api/DeveloperPortalSandboxApi.md#developersandboxreset) | **POST** /api/v1/developer/sandbox/reset | Reset sandbox environment
*DeveloperPortalSandboxApi* | [**developerSandboxStatus**](docs/Api/DeveloperPortalSandboxApi.md#developersandboxstatus) | **GET** /api/v1/developer/sandbox/status | Get sandbox environment status
*DeveloperPortalSandboxApi* | [**developerSandboxTestData**](docs/Api/DeveloperPortalSandboxApi.md#developersandboxtestdata) | **GET** /api/v1/developer/sandbox/test-data | Get sandbox test data patterns
*DeveloperPortalSettlementsApi* | [**developerStatementsDownload**](docs/Api/DeveloperPortalSettlementsApi.md#developerstatementsdownload) | **GET** /api/v1/developer/statements/download | Download settlement statement (CSV)
*DeveloperPortalSettlementsApi* | [**developerStatementsIndex**](docs/Api/DeveloperPortalSettlementsApi.md#developerstatementsindex) | **GET** /api/v1/developer/statements | Get settlement statement
*DeveloperPortalTeamApi* | [**developerTeamAcceptInvite**](docs/Api/DeveloperPortalTeamApi.md#developerteamacceptinvite) | **POST** /api/v1/developer/team/accept-invite | Accept a team invitation
*DeveloperPortalTeamApi* | [**developerTeamIndex**](docs/Api/DeveloperPortalTeamApi.md#developerteamindex) | **GET** /api/v1/developer/team | List team members
*DeveloperPortalTeamApi* | [**developerTeamInvite**](docs/Api/DeveloperPortalTeamApi.md#developerteaminvite) | **POST** /api/v1/developer/team/invite | Invite a team member
*DeveloperPortalTeamApi* | [**developerTeamRemove**](docs/Api/DeveloperPortalTeamApi.md#developerteamremove) | **DELETE** /api/v1/developer/team/{id} | Remove a team member
*DeveloperPortalTeamApi* | [**developerTeamResendInvite**](docs/Api/DeveloperPortalTeamApi.md#developerteamresendinvite) | **POST** /api/v1/developer/team/{id}/resend-invite | Resend a team invitation
*DeveloperPortalTeamApi* | [**developerTeamRole**](docs/Api/DeveloperPortalTeamApi.md#developerteamrole) | **PATCH** /api/v1/developer/team/{id}/role | Change a team member role
*DeveloperPortalUsageAnalyticsApi* | [**usageAnalyticsBreakdown**](docs/Api/DeveloperPortalUsageAnalyticsApi.md#usageanalyticsbreakdown) | **GET** /api/v1/developer/analytics/breakdown | Get API usage breakdown
*DeveloperPortalUsageAnalyticsApi* | [**usageAnalyticsRateLimitStatus**](docs/Api/DeveloperPortalUsageAnalyticsApi.md#usageanalyticsratelimitstatus) | **GET** /api/v1/developer/analytics/rate-limit | Get current rate limit status
*DeveloperPortalUsageAnalyticsApi* | [**usageAnalyticsSummary**](docs/Api/DeveloperPortalUsageAnalyticsApi.md#usageanalyticssummary) | **GET** /api/v1/developer/analytics/summary | Get API usage summary
*DeveloperPortalWebhookDeliveryLogsApi* | [**webhookDeliveryLogIndex**](docs/Api/DeveloperPortalWebhookDeliveryLogsApi.md#webhookdeliverylogindex) | **GET** /api/v1/developer/webhooks/deliveries | List webhook delivery logs
*DeveloperPortalWebhookDeliveryLogsApi* | [**webhookDeliveryLogRetry**](docs/Api/DeveloperPortalWebhookDeliveryLogsApi.md#webhookdeliverylogretry) | **POST** /api/v1/developer/webhooks/deliveries/{id}/retry | Retry a failed webhook delivery
*DeveloperPortalWebhookTestingApi* | [**webhookTestingSendTestEvent**](docs/Api/DeveloperPortalWebhookTestingApi.md#webhooktestingsendtestevent) | **POST** /api/v1/developer/webhooks/{subscriptionId}/test | Send a test webhook event

## Models

- [AcceptInviteRequest](docs/Model/AcceptInviteRequest.md)
- [AddKybOfficerRequest](docs/Model/AddKybOfficerRequest.md)
- [ChangeMemberRoleRequest](docs/Model/ChangeMemberRoleRequest.md)
- [CreateApiKeyRequest](docs/Model/CreateApiKeyRequest.md)
- [DeveloperLoginRequest](docs/Model/DeveloperLoginRequest.md)
- [DeveloperVerifyMfaRequest](docs/Model/DeveloperVerifyMfaRequest.md)
- [ErrorResponse](docs/Model/ErrorResponse.md)
- [FeePreviewRequest](docs/Model/FeePreviewRequest.md)
- [FindVirtualAccountByReferenceRequest](docs/Model/FindVirtualAccountByReferenceRequest.md)
- [GenerateManagedStatementRequest](docs/Model/GenerateManagedStatementRequest.md)
- [GenerateStatementRequest](docs/Model/GenerateStatementRequest.md)
- [IndexPartnerTransactionRequest](docs/Model/IndexPartnerTransactionRequest.md)
- [InitiateWithdrawalRequest](docs/Model/InitiateWithdrawalRequest.md)
- [InviteMemberRequest](docs/Model/InviteMemberRequest.md)
- [IssueManagedCardRequest](docs/Model/IssueManagedCardRequest.md)
- [IssueManagedCardRequestLimits](docs/Model/IssueManagedCardRequestLimits.md)
- [ListManagedCardTransactionsRequest](docs/Model/ListManagedCardTransactionsRequest.md)
- [ManagedCustomerLifecycleRequest](docs/Model/ManagedCustomerLifecycleRequest.md)
- [OnboardManagedCustomerRequest](docs/Model/OnboardManagedCustomerRequest.md)
- [OpenManagedAccountRequest](docs/Model/OpenManagedAccountRequest.md)
- [RecordConsentRequest](docs/Model/RecordConsentRequest.md)
- [RegisterDeveloperRequest](docs/Model/RegisterDeveloperRequest.md)
- [RevokeApiKeyRequest](docs/Model/RevokeApiKeyRequest.md)
- [RevokeConsentRequest](docs/Model/RevokeConsentRequest.md)
- [SendTestWebhookRequest](docs/Model/SendTestWebhookRequest.md)
- [SetManagedCardLimitsRequest](docs/Model/SetManagedCardLimitsRequest.md)
- [SetManagedCardLimitsRequestLimits](docs/Model/SetManagedCardLimitsRequestLimits.md)
- [SetManagedCardPinRequest](docs/Model/SetManagedCardPinRequest.md)
- [StoreWebhookSubscriptionRequest](docs/Model/StoreWebhookSubscriptionRequest.md)
- [TerminateManagedCardRequest](docs/Model/TerminateManagedCardRequest.md)
- [UpdateKybBusinessRequest](docs/Model/UpdateKybBusinessRequest.md)
- [UpdateKybBusinessRequestRegisteredAddress](docs/Model/UpdateKybBusinessRequestRegisteredAddress.md)
- [UpdateKybOfficerRequest](docs/Model/UpdateKybOfficerRequest.md)
- [UpdateWebhookSubscriptionRequest](docs/Model/UpdateWebhookSubscriptionRequest.md)
- [UploadKybDocumentRequest](docs/Model/UploadKybDocumentRequest.md)
- [ValidationError](docs/Model/ValidationError.md)
- [VerifyDeveloperEmailRequest](docs/Model/VerifyDeveloperEmailRequest.md)
- [VirtualAccountQueryIndex200Response](docs/Model/VirtualAccountQueryIndex200Response.md)
- [VirtualAccountQueryIndex200ResponseData](docs/Model/VirtualAccountQueryIndex200ResponseData.md)

## Authorization

Authentication schemes defined for the API:
### apiKeyAuth

- **Type**: API key
- **API key parameter name**: X-Partner-Key
- **Location**: HTTP header


### hmacAuth

- **Type**: API key
- **API key parameter name**: X-Signature
- **Location**: HTTP header


### tenantHeader

- **Type**: API key
- **API key parameter name**: X-Tenant-ID
- **Location**: HTTP header


## Tests

To run the tests, use:

```bash
composer install
vendor/bin/phpunit
```

## Author



## About this package

This PHP package is automatically generated by the [OpenAPI Generator](https://openapi-generator.tech) project:

- API version: `1.0.0`
    - Generator version: `7.11.0`
- Build package: `org.openapitools.codegen.languages.PhpClientCodegen`
