<?php

declare(strict_types=1);

namespace MirayS\Marc\Tests\Integration;

use MirayS\Marc\Exception\MarcException;
use MirayS\Marc\Format;
use MirayS\Marc\Marc;
use MirayS\Marc\Reader\Iso2709Reader;
use MirayS\Marc\Reader\MarcJsonReader;
use MirayS\Marc\Reader\MarcXmlReader;
use PHPUnit\Framework\Attributes\DataProvider;
use PHPUnit\Framework\TestCase;

final class MarcFacadeTest extends TestCase
{
    private const FIXTURES = __DIR__ . '/../fixtures/';

    /**
     * @return iterable<string, array{string, Format, class-string}>
     */
    public static function sources(): iterable
    {
        yield 'marcxml' => ['loc-sru.xml', Format::MarcXml, MarcXmlReader::class];
        yield 'iso 2709' => ['loc.mrc', Format::Iso2709, Iso2709Reader::class];
        yield 'marc in json' => ['loc.ndjson', Format::MarcJson, MarcJsonReader::class];
        yield 'gzipped iso 2709' => ['dnb.mrc.gz', Format::Iso2709, Iso2709Reader::class];
    }

    #[DataProvider('sources')]
    public function testReadsEverySerialisationWithoutBeingTold(string $fixture, Format $format, string $reader): void
    {
        self::assertSame($format, Marc::detect(self::FIXTURES . $fixture));
        self::assertInstanceOf($reader, Marc::reader(self::FIXTURES . $fixture));

        $records = iterator_to_array(Marc::read(self::FIXTURES . $fixture));

        self::assertNotSame([], $records);
        self::assertNotNull($records[0]->getId());
    }

    public function testTheSameRecordComesBackFromEverySerialisation(): void
    {
        $titles = [];

        foreach (['loc-sru.xml', 'loc.mrc', 'loc.ndjson'] as $fixture) {
            foreach (Marc::books(self::FIXTURES . $fixture) as $book) {
                $titles[] = $book->title() . ' ' . implode(',', $book->isbn13s());
            }
        }

        self::assertSame(
            array_fill(0, 3, 'Introduction to algorithms 9780262046305'),
            $titles,
        );
    }

    public function testDetectsStringsToo(): void
    {
        $xml = (string) file_get_contents(self::FIXTURES . 'loc-sru.xml');
        $json = (string) file_get_contents(self::FIXTURES . 'loc.ndjson');
        $binary = (string) file_get_contents(self::FIXTURES . 'loc.mrc');

        self::assertSame(Format::MarcXml, Format::detect($xml));
        self::assertSame(Format::MarcJson, Format::detect($json));
        self::assertSame(Format::Iso2709, Format::detect($binary));
        self::assertNull(Format::detect('nothing marc about this'));

        self::assertCount(1, iterator_to_array(Marc::readString($binary)));
        self::assertCount(1, iterator_to_array(Marc::readString($json)));
        self::assertCount(1, iterator_to_array(Marc::readString($xml)));
    }

    public function testSaysSoWhenItCannotTell(): void
    {
        $this->expectException(MarcException::class);

        iterator_to_array(Marc::readString('plain text'));
    }
}
