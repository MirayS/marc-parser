<?php

declare(strict_types=1);

namespace MirayS\Marc\Tests\Integration;

use MirayS\Marc\Bibliographic\Bibliographic;
use MirayS\Marc\Reader\Iso2709Reader;
use PHPUnit\Framework\TestCase;

final class Iso2709ReaderTest extends TestCase
{
    private const FIXTURES = __DIR__ . '/../fixtures/';

    public function testReadsABinaryRecordProducedByPymarc(): void
    {
        $reader = new Iso2709Reader();
        $records = iterator_to_array($reader->read(self::FIXTURES . 'loc.mrc'));

        self::assertCount(1, $records);
        self::assertSame('22158200', $records[0]->getId());
        self::assertSame('01455cam a2200361 i 4500', $records[0]->getRawLeader());
        self::assertSame(['9780262046305'], Bibliographic::of($records[0])->isbn13s());
        self::assertSame([], $reader->getIssues());
    }

    public function testStreamsSeveralRecords(): void
    {
        $reader = new Iso2709Reader();
        $ids = [];

        foreach ($reader->read(self::FIXTURES . 'dnb.mrc') as $record) {
            $ids[] = $record->getId();
        }

        self::assertCount(5, $ids);
        self::assertSame('1420051687', $ids[0]);
        self::assertSame(5, $reader->getRecordCount());
    }

    public function testReadsGzippedFilesTransparently(): void
    {
        $reader = new Iso2709Reader();
        $records = iterator_to_array($reader->read(self::FIXTURES . 'dnb.mrc.gz'));

        self::assertCount(5, $records);
        self::assertSame('1420051687', $records[0]->getId());
    }

    public function testMemoryStaysFlatWhileStreaming(): void
    {
        $reader = new Iso2709Reader();
        $before = memory_get_usage();
        $count = 0;

        foreach ($reader->read(self::FIXTURES . 'dnb.mrc') as $record) {
            $count++;
            unset($record);
        }

        self::assertSame(5, $count);
        self::assertLessThan(1024 * 512, memory_get_usage() - $before);
    }

    public function testReportsMarc8AsAnEncodingIssue(): void
    {
        $raw = file_get_contents(self::FIXTURES . 'loc.mrc');
        self::assertIsString($raw);
        $raw[9] = ' ';

        $reader = new Iso2709Reader();
        iterator_to_array($reader->readString($raw));

        $types = array_map(static fn ($issue): string => $issue->type, $reader->getIssues());

        self::assertContains('encoding', $types);
    }

    public function testCapturesTheRawRecordOnDemand(): void
    {
        $reader = new Iso2709Reader(captureRaw: true);

        foreach ($reader->read(self::FIXTURES . 'loc.mrc') as $record) {
            self::assertSame(file_get_contents(self::FIXTURES . 'loc.mrc'), $reader->getRecordRaw());
            self::assertSame('22158200', $record->getId());
        }
    }
}
