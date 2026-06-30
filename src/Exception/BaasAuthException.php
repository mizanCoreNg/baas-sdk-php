<?php

declare(strict_types=1);

namespace MizanCore\BaasSdk\Exception;

/** Raised on 401/403 — invalid/missing X-API-Key, or insufficient scope. */
final class BaasAuthException extends BaasApiException
{
}
