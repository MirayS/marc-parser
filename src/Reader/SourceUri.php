<?php

declare(strict_types=1);

namespace MirayS\Marc\Reader;

use MirayS\Marc\Exception\MarcException;
use ZipArchive;

final class SourceUri
{
    public static function resolve(string $source): string
    {
        if (preg_match('#^[a-z0-9.+-]+://#i', $source) === 1) {
            return $source;
        }

        if (!is_file($source) || !is_readable($source)) {
            throw new MarcException(sprintf('MARC file %s is not readable', $source));
        }

        $extension = strtolower(pathinfo($source, PATHINFO_EXTENSION));

        return match ($extension) {
            'gz', 'gzip' => 'compress.zlib://' . $source,
            'bz2' => 'compress.bzip2://' . $source,
            'zip' => 'zip://' . $source . '#' . self::firstZipEntry($source),
            default => $source,
        };
    }

    public static function head(string $source, int $bytes = 512): string
    {
        $handle = @fopen(self::resolve($source), 'rb');

        if ($handle === false) {
            throw new MarcException(sprintf('Cannot open MARC source %s', $source));
        }

        try {
            return (string) fread($handle, $bytes);
        } finally {
            fclose($handle);
        }
    }

    private static function firstZipEntry(string $source): string
    {
        if (!class_exists(ZipArchive::class)) {
            throw new MarcException('ext-zip is required to read zipped MARC files');
        }

        $zip = new ZipArchive();

        if ($zip->open($source) !== true) {
            throw new MarcException(sprintf('Cannot open zip archive %s', $source));
        }

        for ($i = 0; $i < $zip->numFiles; $i++) {
            $name = (string) $zip->getNameIndex($i);

            if (!str_ends_with($name, '/')) {
                $zip->close();

                return $name;
            }
        }

        $zip->close();

        throw new MarcException(sprintf('No entry found in %s', $source));
    }
}
