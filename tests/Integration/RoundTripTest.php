<?php

declare(strict_types=1);

namespace MirayS\Marc\Tests\Integration;

use MirayS\Marc\Reader\Iso2709Reader;
use MirayS\Marc\Reader\MarcJsonReader;
use MirayS\Marc\Reader\MarcXmlReader;
use MirayS\Marc\Record\ControlField;
use MirayS\Marc\Record\DataField;
use MirayS\Marc\Record\Record;
use MirayS\Marc\Writer\Iso2709Writer;
use MirayS\Marc\Writer\MarcJsonWriter;
use MirayS\Marc\Writer\MarcXmlWriter;
use PHPUnit\Framework\Attributes\DataProvider;
use PHPUnit\Framework\TestCase;

final class RoundTripTest extends TestCase
{
    private const FIXTURES = __DIR__ . '/../fixtures/';

    /**
     * @return iterable<string, array{string}>
     */
    public static function fixtures(): iterable
    {
        yield 'dnb sru' => ['dnb-sru.xml'];
        yield 'dnb oai' => ['dnb-oai.xml'];
        yield 'dnb reihe n' => ['dnb-reihe-n.xml'];
        yield 'loc sru' => ['loc-sru.xml'];
    }

    #[DataProvider('fixtures')]
    public function testXmlToBinaryToJsonAndBack(string $fixture): void
    {
        $records = iterator_to_array((new MarcXmlReader())->read(self::FIXTURES . $fixture));

        self::assertNotSame([], $records);

        foreach ($records as $record) {
            $binary = (new Iso2709Reader())->readString((new Iso2709Writer())->write($record));
            $fromBinary = iterator_to_array($binary)[0];
            self::assertSame($this->snapshot($record), $this->snapshot($fromBinary));

            $fromJson = (new MarcJsonReader())->readArray(
                (array) json_decode((new MarcJsonWriter())->write($record), true),
            );
            self::assertSame($this->snapshot($record), $this->snapshot($fromJson));

            $fromXml = iterator_to_array((new MarcXmlReader())->readString((new MarcXmlWriter())->write($record)))[0];
            self::assertSame($this->snapshot($record), $this->snapshot($fromXml));

            $binaryToXml = iterator_to_array(
                (new MarcXmlReader())->readString((new MarcXmlWriter())->write($fromBinary)),
            )[0];
            self::assertSame($this->snapshot($record), $this->snapshot($binaryToXml));
        }
    }

    public function testCollectionsSurviveTheXmlWriter(): void
    {
        $records = iterator_to_array((new MarcXmlReader())->read(self::FIXTURES . 'dnb-oai.xml'));
        $xml = (new MarcXmlWriter())->writeCollection($records);
        $parsed = iterator_to_array((new MarcXmlReader())->readString($xml));

        self::assertCount(count($records), $parsed);
        self::assertSame(
            array_map(fn (Record $record): string => $this->snapshot($record), $records),
            array_map(fn (Record $record): string => $this->snapshot($record), $parsed),
        );
    }

    public function testBinaryFixtureMatchesTheXmlFixture(): void
    {
        $fromXml = iterator_to_array((new MarcXmlReader())->read(self::FIXTURES . 'loc-sru.xml'))[0];
        $fromBinary = iterator_to_array((new Iso2709Reader())->read(self::FIXTURES . 'loc.mrc'))[0];
        $fromJson = iterator_to_array((new MarcJsonReader())->read(self::FIXTURES . 'loc.ndjson'))[0];

        self::assertSame($this->snapshot($fromXml), $this->snapshot($fromBinary));
        self::assertSame($this->snapshot($fromXml), $this->snapshot($fromJson));
    }

    private function snapshot(Record $record): string
    {
        $lines = [substr($record->getRawLeader(), 5, 7) . substr($record->getRawLeader(), 17)];

        foreach ($record->getFields() as $field) {
            if ($field instanceof ControlField) {
                $lines[] = $field->getTag() . '|' . $field->getValue();

                continue;
            }

            if (!$field instanceof DataField) {
                continue;
            }

            $line = $field->getTag() . '|' . $field->getIndicator1() . $field->getIndicator2();

            foreach ($field->getSubfields() as $subfield) {
                $line .= '|$' . $subfield->getCode() . $subfield->getValue();
            }

            $lines[] = $line;
        }

        return implode("\n", $lines);
    }
}
