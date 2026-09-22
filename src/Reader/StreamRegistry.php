<?php

declare(strict_types=1);

namespace MirayS\Marc\Reader;

final class StreamRegistry
{
    public const PROTOCOL = 'marc-stream';

    private static array $streams = [];

    private static bool $registered = false;

    /**
     * @param resource $stream
     */
    public static function register($stream): string
    {
        if (!self::$registered) {
            stream_wrapper_register(self::PROTOCOL, StreamWrapper::class);
            self::$registered = true;
        }

        $id = bin2hex(random_bytes(8));
        self::$streams[$id] = $stream;

        return self::PROTOCOL . '://' . $id;
    }

    public static function get(string $id)
    {
        return self::$streams[$id] ?? null;
    }

    public static function release(string $uri): void
    {
        $id = str_replace(self::PROTOCOL . '://', '', $uri);
        unset(self::$streams[$id]);
    }
}
