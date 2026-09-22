<?php

declare(strict_types=1);

namespace MirayS\Marc\Writer;

use MirayS\Marc\Exception\MarcException;
use MirayS\Marc\Reader\Iso2709Reader;
use MirayS\Marc\Record\ControlField;
use MirayS\Marc\Record\DataField;
use MirayS\Marc\Record\Leader;
use MirayS\Marc\Record\Record;

final class Iso2709Writer
{
    public const MAX_RECORD_LENGTH = 99999;

    public const MAX_FIELD_LENGTH = 9999;

    public function __construct(private readonly bool $clampOversized = false)
    {
    }

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

            if (strlen($content) > self::MAX_FIELD_LENGTH) {
                if (!$this->clampOversized) {
                    throw new MarcException(sprintf(
                        'Field %s of record %s is %d bytes long; an ISO 2709 directory entry holds at most %d. '
                        . 'Write it as MARCXML or MARC-in-JSON, or split the field.',
                        $field->getTag(),
                        $record->getId() ?? '(no 001)',
                        strlen($content),
                        self::MAX_FIELD_LENGTH,
                    ));
                }

                $content = substr($content, 0, self::MAX_FIELD_LENGTH - 1) . Iso2709Reader::FIELD_TERMINATOR;
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

        if ($length > self::MAX_RECORD_LENGTH || $baseAddress > self::MAX_RECORD_LENGTH) {
            if (!$this->clampOversized) {
                throw new MarcException(sprintf(
                    'Record %s is %d bytes long; ISO 2709 holds at most %d. Write it as MARCXML or MARC-in-JSON, '
                    . 'or construct the writer with clampOversized: true to cap the leader as some vendors do.',
                    $record->getId() ?? '(no 001)',
                    $length,
                    self::MAX_RECORD_LENGTH,
                ));
            }

            $length = min($length, self::MAX_RECORD_LENGTH);
            $baseAddress = min($baseAddress, self::MAX_RECORD_LENGTH);
        }

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
