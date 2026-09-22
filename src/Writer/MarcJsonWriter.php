<?php

declare(strict_types=1);

namespace MirayS\Marc\Writer;

use MirayS\Marc\Record\ControlField;
use MirayS\Marc\Record\DataField;
use MirayS\Marc\Record\Record;

final class MarcJsonWriter
{
    public function __construct(private readonly int $flags = JSON_UNESCAPED_UNICODE | JSON_UNESCAPED_SLASHES)
    {
    }

    public function write(Record $record): string
    {
        return (string) json_encode($this->toArray($record), $this->flags);
    }

    /**
     * @param iterable<Record> $records
     */
    public function writeLines(iterable $records): string
    {
        $lines = [];

        foreach ($records as $record) {
            $lines[] = $this->write($record);
        }

        return implode("\n", $lines) . ($lines === [] ? '' : "\n");
    }

    /**
     * @return array{leader: string, fields: list<array<string, mixed>>}
     */
    public function toArray(Record $record): array
    {
        $fields = [];

        foreach ($record->getFields() as $field) {
            if ($field instanceof ControlField) {
                $fields[] = [$field->getTag() => $field->getValue()];

                continue;
            }

            if (!$field instanceof DataField) {
                continue;
            }

            $subfields = [];

            foreach ($field->getSubfields() as $subfield) {
                $subfields[] = [$subfield->getCode() => $subfield->getValue()];
            }

            $fields[] = [
                $field->getTag() => [
                    'subfields' => $subfields,
                    'ind1' => $field->getIndicator1(),
                    'ind2' => $field->getIndicator2(),
                ],
            ];
        }

        return ['leader' => $record->getRawLeader(), 'fields' => $fields];
    }
}
