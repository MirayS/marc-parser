<?php

declare(strict_types=1);

namespace MirayS\Marc\Tests\Unit;

use MirayS\Marc\Exception\MarcException;
use MirayS\Marc\Reader\Iso2709Reader;
use MirayS\Marc\Record\ControlField;
use MirayS\Marc\Record\DataField;
use MirayS\Marc\Record\Leader;
use MirayS\Marc\Record\Record;
use MirayS\Marc\Record\Subfield;
use MirayS\Marc\Writer\Iso2709Writer;
use PHPUnit\Framework\TestCase;

final class Iso2709WriterTest extends TestCase
{
    public function testWritesTheExpectedBytes(): void
    {
        $record = new Record('00000nam a2200000 c 4500', [
            new ControlField('001', '42'),
            new DataField('245', '1', '0', [new Subfield('a', 'Test')]),
        ]);

        $written = (new Iso2709Writer())->write($record);

        $expected = '00062nam a2200049 c 4500'
            . '001000300000' . '245000900003' . "\x1E"
            . '42' . "\x1E"
            . '10' . "\x1F" . 'aTest' . "\x1E"
            . "\x1D";

        self::assertSame($expected, $written);
        self::assertSame(62, strlen($written));
        self::assertSame(62, (int) substr($written, 0, 5));
        self::assertSame(49, (int) substr($written, 12, 5));
    }

    public function testRefusesRecordsTheFormatCannotHold(): void
    {
        $record = new Record(Leader::DEFAULT, $this->manyFields(20));

        $this->expectException(MarcException::class);
        $this->expectExceptionMessageMatches('/\d{6} bytes long/');

        (new Iso2709Writer())->write($record);
    }

    public function testRefusesFieldsLongerThanADirectoryEntry(): void
    {
        $record = new Record(Leader::DEFAULT, [
            new DataField('505', ' ', ' ', [new Subfield('a', str_repeat('y', 12000))]),
        ]);

        $this->expectException(MarcException::class);
        $this->expectExceptionMessageMatches('/Field 505 .* at most 9999/');

        (new Iso2709Writer())->write($record);
    }

    public function testClampsOnlyWhenAskedTo(): void
    {
        $record = new Record(Leader::DEFAULT, $this->manyFields(20));

        $written = (new Iso2709Writer(clampOversized: true))->write($record);

        self::assertSame('99999', substr($written, 0, 5));
        self::assertGreaterThan(99999, strlen($written));
    }

    /**
     * @return list<DataField>
     */
    private function manyFields(int $count): array
    {
        $fields = [];

        for ($i = 0; $i < $count; $i++) {
            $fields[] = new DataField('500', ' ', ' ', [new Subfield('a', str_repeat('x', 9000))]);
        }

        return $fields;
    }

    public function testWrittenRecordIsReadableAgain(): void
    {
        $record = new Record('00000nam a2200000 c 4500', [
            new ControlField('001', '42'),
            new ControlField('008', '221024s2023    gw ||||| |||| 00||||ger  '),
            new DataField('245', '1', '0', [new Subfield('a', 'Größenwahn'), new Subfield('b', 'Roman')]),
        ]);

        $reader = new Iso2709Reader();
        $parsed = iterator_to_array($reader->readString((new Iso2709Writer())->write($record)));

        self::assertCount(1, $parsed);
        self::assertSame('Größenwahn', $parsed[0]->getDataField('245')?->subfield('a'));
        self::assertSame(substr($record->getRawLeader(), 5, 7), substr($parsed[0]->getRawLeader(), 5, 7));
        self::assertSame(substr($record->getRawLeader(), 17), substr($parsed[0]->getRawLeader(), 17));
    }
}
