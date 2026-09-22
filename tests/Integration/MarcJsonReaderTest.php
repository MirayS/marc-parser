<?php

declare(strict_types=1);

namespace MirayS\Marc\Tests\Integration;

use MirayS\Marc\Bibliographic\Bibliographic;
use MirayS\Marc\Reader\MarcJsonReader;
use MirayS\Marc\Reader\MarcXmlReader;
use MirayS\Marc\Writer\MarcJsonWriter;
use PHPUnit\Framework\TestCase;

final class MarcJsonReaderTest extends TestCase
{
    private const FIXTURES = __DIR__ . '/../fixtures/';

    public function testReadsMarcInJsonWrittenByPymarc(): void
    {
        $reader = new MarcJsonReader();
        $records = iterator_to_array($reader->read(self::FIXTURES . 'loc.ndjson'));

        self::assertCount(1, $records);
        self::assertSame('22158200', $records[0]->getId());
        self::assertSame('01455cam a2200361 i 4500', $records[0]->getRawLeader());
        self::assertSame('Introduction to algorithms', Bibliographic::of($records[0])->title());
        self::assertSame('0', $records[0]->getDataField('245')?->getIndicator2());
    }

    public function testOurJsonMatchesPymarcByteForByte(): void
    {
        $records = iterator_to_array((new MarcXmlReader())->read(self::FIXTURES . 'loc-sru.xml'));
        $written = (new MarcJsonWriter())->write($records[0]);

        self::assertJsonStringEqualsJsonString(trim((string) file_get_contents(self::FIXTURES . 'loc.ndjson')), $written);
    }

    public function testReadsAJsonArrayAsWellAsNdjson(): void
    {
        $line = trim((string) file_get_contents(self::FIXTURES . 'loc.ndjson'));

        $fromArray = iterator_to_array((new MarcJsonReader())->readString('[' . $line . ',' . $line . ']'));
        $fromLines = iterator_to_array((new MarcJsonReader())->readString($line . "\n" . $line));

        self::assertCount(2, $fromArray);
        self::assertCount(2, $fromLines);
        self::assertSame($fromArray[0]->getId(), $fromLines[0]->getId());
    }

    public function testCollectsJsonErrorsInsteadOfThrowing(): void
    {
        $reader = new MarcJsonReader();
        iterator_to_array($reader->readString('{"leader": '));

        self::assertNotSame([], $reader->getIssues());
        self::assertSame('json_error', $reader->getIssues()[0]->type);
    }
}
