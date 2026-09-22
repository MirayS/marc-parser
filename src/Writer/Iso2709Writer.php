<?php

declare(strict_types=1);

namespace MirayS\Marc\Writer;

use MirayS\Marc\Reader\Iso2709Reader;
use MirayS\Marc\Record\ControlField;
use MirayS\Marc\Record\DataField;
use MirayS\Marc\Record\Leader;
use MirayS\Marc\Record\Record;

final class Iso2709Writer
{
    public function write(Record $record): string
    {
        $directory = '';
        $data = '';

        foreach ($record->getFields() as $field) {
            if ($field instanceof ControlField) {
                $content = $field->getValue() . Iso2709Reader::FIELD_TERMINATOR;
            } elseif ($field instanceof DataField) {
                $content = $field->getIndicator1() . $field->getIndicator2();

                foreach ($field->getSubfields() as $subfield) {
                    $content .= Iso2709Reader::SUBFIELD_DELIMITER . $subfield->getCode() . $subfield->getValue();
                }

                $content .= Iso2709Reader::FIELD_TERMINATOR;
            } else {
                continue;
            }

            $directory .= $field->getTag()
                . str_pad((string) strlen($content), 4, '0', STR_PAD_LEFT)
                . str_pad((string) strlen($data), 5, '0', STR_PAD_LEFT);

            $data .= $content;
        }

        $directory .= Iso2709Reader::FIELD_TERMINATOR;
        $data .= Iso2709Reader::RECORD_TERMINATOR;

        $baseAddress = Leader::LENGTH + strlen($directory);
        $length = $baseAddress + strlen($data);

        $leader = str_pad(substr($record->getRawLeader(), 0, Leader::LENGTH), Leader::LENGTH, ' ');
        $leader = str_pad((string) $length, 5, '0', STR_PAD_LEFT)
            . substr($leader, 5, 7)
            . str_pad((string) $baseAddress, 5, '0', STR_PAD_LEFT)
            . substr($leader, 17);

        return $leader . $directory . $data;
    }

    /**
     * @param iterable<Record> $records
     */
    public function writeAll(iterable $records): string
    {
        $out = '';

        foreach ($records as $record) {
            $out .= $this->write($record);
        }

        return $out;
    }
}
