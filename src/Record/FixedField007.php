<?php

declare(strict_types=1);

namespace MirayS\Marc\Record;

final class FixedField007 extends CodedField
{
    public function getCategoryOfMaterial(): string
    {
        return (string) $this->at(0);
    }

    public function getSpecificMaterialDesignation(): ?string
    {
        return $this->at(1);
    }

    public function getRecordFormat(): RecordFormat
    {
        return RecordFormat::Bibliographic;
    }

    protected function tag(): string
    {
        return '007';
    }

    protected function variant(): string
    {
        return $this->getCategoryOfMaterial();
    }

    public function isOnlineResource(): bool
    {
        return $this->getCategoryOfMaterial() === 'c' && $this->getSpecificMaterialDesignation() === 'r';
    }

    public function isMicroform(): bool
    {
        return $this->getCategoryOfMaterial() === 'h';
    }

    public function isSoundRecording(): bool
    {
        return $this->getCategoryOfMaterial() === 's';
    }
}
