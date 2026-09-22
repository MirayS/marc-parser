<?php

declare(strict_types=1);

namespace MirayS\Marc\Record;

final class FixedField006 extends CodedField
{
    public const LENGTH = 18;

    public function getFormOfMaterial(): string
    {
        return (string) $this->at(0);
    }

    public function getMaterialType(): MaterialType
    {
        return MaterialType::fromFormOfMaterial($this->getFormOfMaterial());
    }

    public function getRecordFormat(): RecordFormat
    {
        return RecordFormat::Bibliographic;
    }

    protected function tag(): string
    {
        return '006';
    }

    protected function variant(): string
    {
        return $this->getMaterialType()->code();
    }
}
