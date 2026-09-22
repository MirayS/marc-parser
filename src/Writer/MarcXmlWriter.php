<?php

declare(strict_types=1);

namespace MirayS\Marc\Writer;

use MirayS\Marc\Reader\MarcXmlReader;
use MirayS\Marc\Record\ControlField;
use MirayS\Marc\Record\DataField;
use MirayS\Marc\Record\Record;
use XMLWriter;

final class MarcXmlWriter
{
    public function __construct(private readonly bool $indent = true)
    {
    }

    public function write(Record $record): string
    {
        $writer = $this->writer();
        $this->writeRecord($writer, $record, true);

        return (string) $writer->outputMemory();
    }

    /**
     * @param iterable<Record> $records
     */
    public function writeCollection(iterable $records): string
    {
        $writer = $this->writer();
        $writer->startDocument('1.0', 'UTF-8');
        $writer->startElementNs(null, 'collection', MarcXmlReader::NAMESPACE);

        foreach ($records as $record) {
            $this->writeRecord($writer, $record, false);
        }

        $writer->endElement();
        $writer->endDocument();

        return (string) $writer->outputMemory();
    }

    private function writer(): XMLWriter
    {
        $writer = new XMLWriter();
        $writer->openMemory();

        if ($this->indent) {
            $writer->setIndent(true);
            $writer->setIndentString('  ');
        }

        return $writer;
    }

    private function writeRecord(XMLWriter $writer, Record $record, bool $withNamespace): void
    {
        if ($withNamespace) {
            $writer->startElementNs(null, 'record', MarcXmlReader::NAMESPACE);
        } else {
            $writer->startElement('record');
        }

        $writer->writeElement('leader', $record->getRawLeader());

        foreach ($record->getFields() as $field) {
            if ($field instanceof ControlField) {
                $writer->startElement('controlfield');
                $writer->writeAttribute('tag', $field->getTag());
                $writer->text($field->getValue());
                $writer->endElement();

                continue;
            }

            if (!$field instanceof DataField) {
                continue;
            }

            $writer->startElement('datafield');
            $writer->writeAttribute('tag', $field->getTag());
            $writer->writeAttribute('ind1', $field->getIndicator1());
            $writer->writeAttribute('ind2', $field->getIndicator2());

            foreach ($field->getSubfields() as $subfield) {
                $writer->startElement('subfield');
                $writer->writeAttribute('code', $subfield->getCode());
                $writer->text($subfield->getValue());
                $writer->endElement();
            }

            $writer->endElement();
        }

        $writer->endElement();
    }
}
