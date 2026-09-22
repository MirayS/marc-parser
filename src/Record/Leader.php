<?php

declare(strict_types=1);

namespace MirayS\Marc\Record;

final class Leader extends CodedField
{
    public const LENGTH = 24;

    public const DEFAULT = '00000nam a2200000   4500';

    public function getRecordFormat(): RecordFormat
    {
        return RecordFormat::fromLeader($this->getTypeOfRecord());
    }

    protected function tag(): string
    {
        return 'LDR';
    }

    protected function variant(): string
    {
        return 'ALL';
    }

    public function aliases(): array
    {
        return [
            'recordLength' => 'logicalRecordLength',
            'logicalRecordLength' => 'recordLength',
            'subfieldCodeCount' => 'subfieldCodeLength',
            'subfieldCodeLength' => 'subfieldCodeCount',
        ];
    }

    public function getRecordLength(): int
    {
        return (int) $this->at(0, 5);
    }

    public function getRecordStatus(): string
    {
        return (string) $this->at(5);
    }

    public function getTypeOfRecord(): string
    {
        return (string) $this->at(6);
    }

    public function getBibliographicLevel(): string
    {
        return (string) $this->at(7);
    }

    public function getTypeOfControl(): string
    {
        return (string) $this->at(8);
    }

    public function getCharacterCodingScheme(): string
    {
        return (string) $this->at(9);
    }

    public function getBaseAddressOfData(): int
    {
        return (int) $this->at(12, 5);
    }

    public function getEncodingLevel(): string
    {
        return (string) $this->at(17);
    }

    public function getDescriptiveCatalogingForm(): string
    {
        return (string) $this->at(18);
    }

    public function getMultipartResourceRecordLevel(): string
    {
        return (string) $this->at(19);
    }

    public function getMaterialType(): MaterialType
    {
        return MaterialType::fromLeader($this->getTypeOfRecord(), $this->getBibliographicLevel());
    }

    public function isBibliographic(): bool
    {
        return $this->getRecordFormat() === RecordFormat::Bibliographic;
    }

    public function isUnicode(): bool
    {
        return $this->getCharacterCodingScheme() === 'a';
    }

    public function isDeleted(): bool
    {
        return $this->getRecordStatus() === 'd';
    }

    public function isMonograph(): bool
    {
        return $this->getBibliographicLevel() === 'm';
    }

    public function isLanguageMaterial(): bool
    {
        return in_array($this->getTypeOfRecord(), ['a', 't'], true);
    }
}
