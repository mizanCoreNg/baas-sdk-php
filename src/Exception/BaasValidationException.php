<?php

declare(strict_types=1);

namespace MizanCore\BaasSdk\Exception;

/** Raised on 422 — request failed FormRequest validation; see ->getErrors(). */
final class BaasValidationException extends BaasApiException
{
}
