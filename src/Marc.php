<?php

declare(strict_types=1);

namespace MirayS\Marc;

use Generator;
use MirayS\Marc\Bibliographic\Bibliographic;
use MirayS\Marc\Exception\MarcException;
use MirayS\Marc\Reader\AbstractReader;
use MirayS\Marc\Reader\Iso2709Reader;
use MirayS\Marc\Reader\MarcJsonReader;
use MirayS\Marc\Reader\MarcXmlReader;
use MirayS\Marc\Reader\SourceUri;
use MirayS\Marc\Record\Record;

final class Marc
{
    /**
     * @return Generator<int, Record>
     */
    public static function read(string $source, ?Format $format = null, bool $strict = false): Generator
    {
        yield from self::reader($source, $format, $strict)->read($source);
    }

    /**
     * @return Generator<int, Record>
     */
    public static function readString(string $data, ?Format $format = null, bool $strict = false): Generator
    {
        $format ??= Format::detect($data);

        if ($format === null) {
            throw new MarcException('Cannot detect the MARC serialisation of the given string');
        }

        yield from self::readerFor($format, $strict)->readString($data);
    }

    /**
     * @return Generator<int, Bibliographic>
     */
    public static function books(string $source, ?Format $format = null): Generator
    {
        foreach (self::read($source, $format) as $record) {
            yield Bibliographic::of($record);
        }
    }

    public static function reader(string $source, ?Format $format = null, bool $strict = false): AbstractReader
    {
        $format ??= self::detect($source);

        return self::readerFor($format, $strict);
    }

    public static function detect(string $source): Format
    {
        $format = Format::detect(SourceUri::head($source));

        if ($format !== null) {
            return $format;
        }

        $format = match (strtolower(pathinfo(preg_replace('/\.(gz|gzip|bz2|zip)$/i', '', $source) ?? $source, PATHINFO_EXTENSION))) {
            'xml' => Format::MarcXml,
            'json', 'ndjson', 'jsonl' => Format::MarcJson,
            'mrc', 'marc', 'mrk' => Format::Iso2709,
            default => null,
        };

        if ($format === null) {
            throw new MarcException(sprintf('Cannot detect the MARC serialisation of %s', $source));
        }

        return $format;
    }

    private static function readerFor(Format $format, bool $strict): AbstractReader
    {
        return match ($format) {
            Format::Iso2709 => new Iso2709Reader($strict),
            Format::MarcXml => new MarcXmlReader($strict),
            Format::MarcJson => new MarcJsonReader($strict),
        };
    }
}
