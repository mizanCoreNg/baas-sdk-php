<?php

declare(strict_types=1);

namespace MizanCore\BaasSdk\Exception;

/** Raised on 429 — rate limit exceeded. The SDK auto-retries (Retry-After) before surfacing this. */
final class BaasRateLimitException extends BaasApiException
{
}
