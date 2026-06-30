<?php

declare(strict_types=1);

namespace MizanCore\BaasSdk\Support;

/**
 * Minimal, dependency-free RFC 4122 UUIDv4 generator.
 *
 * Implemented with random_bytes(16) + version/variant bit-twiddling so the SDK
 * adds NO new dependencies (no ramsey/uuid). 122 bits of entropy.
 */
final class Uuid
{
    /**
     * Generate a random (version 4) UUID string.
     */
    public static function v4(): string
    {
        $bytes = random_bytes(16);

        // Set version to 0100 (v4) in the 7th byte.
        $bytes[6] = chr((ord($bytes[6]) & 0x0f) | 0x40);
        // Set variant to 10xx (RFC 4122) in the 9th byte.
        $bytes[8] = chr((ord($bytes[8]) & 0x3f) | 0x80);

        $hex = bin2hex($bytes);

        return sprintf(
            '%s-%s-%s-%s-%s',
            substr($hex, 0, 8),
            substr($hex, 8, 4),
            substr($hex, 12, 4),
            substr($hex, 16, 4),
            substr($hex, 20, 12)
        );
    }

    /**
     * Validate that a string is a canonical RFC 4122 UUID (any version).
     */
    public static function isValid(string $value): bool
    {
        return (bool) preg_match(
            '/^[0-9a-f]{8}-[0-9a-f]{4}-[0-9a-f]{4}-[0-9a-f]{4}-[0-9a-f]{12}$/i',
            $value
        );
    }
}
