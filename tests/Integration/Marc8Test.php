<?php

declare(strict_types=1);

namespace MirayS\Marc\Tests\Integration;

use MirayS\Marc\Encoding\Encoding;
use MirayS\Marc\Encoding\Marc8Decoder;
use MirayS\Marc\Reader\Iso2709Reader;
use MirayS\Marc\Reader\MarcJsonReader;
use MirayS\Marc\Writer\MarcJsonWriter;
use PHPUnit\Framework\TestCase;

final class Marc8Test extends TestCase
{
    private const FIXTURES = __DIR__ . '/../fixtures/';

    public function testDecodesEveryLineOfTheReferenceCorpus(): void
    {
        $marc8 = file(self::FIXTURES . 'marc8-corpus.marc8.txt', FILE_IGNORE_NEW_LINES);
        $utf8 = file(self::FIXTURES . 'marc8-corpus.utf8.txt', FILE_IGNORE_NEW_LINES);

        self::assertIsArray($marc8);
        self::assertIsArray($utf8);
        self::assertSame(count($utf8), count($marc8));
        self::assertGreaterThan(1000, count($marc8));

        $decoder = new Marc8Decoder();
        $mismatched = [];

        foreach ($marc8 as $index => $line) {
            $expected = \Normalizer::normalize($utf8[$index], \Normalizer::FORM_C);
            $actual = $decoder->decode($line);

            if ($actual !== $expected) {
                $mismatched[] = sprintf('line %d: %s != %s', $index + 1, $actual, $expected);
            }
        }

        self::assertSame([], $mismatched);
    }

    public function testDecodesDiacriticsAndAlternateCodeSets(): void
    {
        $decoder = new Marc8Decoder();

        self::assertSame('Maŕquez', $decoder->decode("Ma\xE2rquez"));
        self::assertSame('Gödel', $decoder->decode("G\xE8odel"));
        self::assertSame('мОСКВА', $decoder->decode("\x1b(N\x4d\x6f\x73\x6b\x77\x61"));
        self::assertSame('年 ok', $decoder->decode("\x1b\$1\x21\x3c\x65\x1b(B ok"));
        self::assertSame([], $decoder->getUnmapped());

        self::assertStringContainsString('unknown code set', implode(' ', (static function (): array {
            $decoder = new Marc8Decoder();
            $decoder->decode("\x1b(\x99abc");

            return $decoder->getUnmapped();
        })()));
    }

    public function testReadsAMarc8FileTheWayPymarcDoes(): void
    {
        $reader = new Iso2709Reader();
        $writer = new MarcJsonWriter();
        $ours = [];

        foreach ($reader->read(self::FIXTURES . 'marc8.mrc') as $record) {
            $ours[] = json_decode($writer->write($record), true);
        }

        $expected = [];

        foreach (iterator_to_array((new MarcJsonReader())->read(self::FIXTURES . 'marc8-decoded.ndjson')) as $record) {
            $expected[] = json_decode($writer->write($record), true);
        }

        self::assertCount(20, $ours);
        self::assertSame($expected, $ours);
    }

    public function testEncodingCanBeForced(): void
    {
        $raw = (string) file_get_contents(self::FIXTURES . 'marc8.mrc');

        $asUtf8 = iterator_to_array((new Iso2709Reader(encoding: Encoding::Utf8))->readString($raw));
        $asMarc8 = iterator_to_array((new Iso2709Reader(encoding: Encoding::Marc8))->readString($raw));
        $automatic = iterator_to_array((new Iso2709Reader())->readString($raw));

        $author = static fn ($record): ?string => $record->getDataField('100')?->subfield('a');

        self::assertSame('Kolundžija, Branko M.', $author($automatic[3]));
        self::assertSame('Kolundžija, Branko M.', $author($asMarc8[3]));
        self::assertNotSame($author($automatic[3]), $author($asUtf8[3]));
    }

    public function testUtf8RecordsAreLeftAlone(): void
    {
        $records = iterator_to_array((new Iso2709Reader())->read(self::FIXTURES . 'dnb.mrc'));

        self::assertSame(
            'Machine Learning Electrostatic Interactions in Materials',
            $records[0]->getDataField('245')?->subfield('a'),
        );
    }
}
