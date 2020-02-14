<?php

declare(strict_types=1);

namespace Gubler\UuidEncoderBundle\Util;

use Gubler\UuidEncoder\UuidEncoder;
use Ramsey\Uuid\UuidInterface;

class FilesystemUuidEncoder
{
    public const FILESYSTEM_CHARSET = 'ABCDEFGHIJKLMNOPQRSTUVWXYZabcdefghijklmnopqrstuvwxyz0123456789';

    /**
     * Parse input and return a UUID if possible
     *
     * - If a UUID is provided, will return the UUID,
     * - If a UUID String is provided, will convert to a UUID
     * - If an encoded UUID string (from this class's encode method) is provided, will decode and return UUID
     *
     * @param UuidInterface|string $id
     */
    public function parse($id): UuidInterface
    {
        $encoder = new UuidEncoder(self::FILESYSTEM_CHARSET);

        return $encoder->parse($id);
    }

    /**
     * Encode a UUID to a shorter string.
     *
     * The provided $uuid will be parsed before encoding
     *
     * @param UuidInterface|string $uuid
     */
    public function encode($uuid): string
    {
        $encoder = new UuidEncoder(self::FILESYSTEM_CHARSET);

        return $encoder->encode($uuid);
    }

    /**
     * Decode a string generated by UuidEncoder::encode() back into a UUID.
     */
    public function decode(string $encodedUuid): UuidInterface
    {
        $encoder = new UuidEncoder(self::FILESYSTEM_CHARSET);

        return $encoder->decode($encodedUuid);
    }
}
