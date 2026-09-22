<?php

declare(strict_types=1);

namespace MirayS\Marc\Record;

final class Leader extends PositionalField
{
    public const LENGTH = 24;

    public const DEFAULT = '00000nam a2200000   4500';

    public function positions(): array
    {
        return [
            'recordLength' => [0, 5],
            'recordStatus' => [5, 1],
            'typeOfRecord' => [6, 1],
            'bibliographicLevel' => [7, 1],
            'typeOfControl' => [8, 1],
            'characterCodingScheme' => [9, 1],
            'indicatorCount' => [10, 1],
            'subfieldCodeCount' => [11, 1],
            'baseAddressOfData' => [12, 5],
            'encodingLevel' => [17, 1],
            'descriptiveCatalogingForm' => [18, 1],
            'multipartResourceRecordLevel' => [19, 1],
            'entryMap' => [20, 4],
        ];
    }

    public function getRecordLength(): int
    {
        return (int) $this->get('recordLength');
    }

    public function getRecordStatus(): string
    {
        return (string) $this->get('recordStatus');
    }

    public function getTypeOfRecord(): string
    {
        return (string) $this->get('typeOfRecord');
    }

    public function getBibliographicLevel(): string
    {
        return (string) $this->get('bibliographicLevel');
    }

    public function getTypeOfControl(): string
    {
        return (string) $this->get('typeOfControl');
    }

    public function getCharacterCodingScheme(): string
    {
        return (string) $this->get('characterCodingScheme');
    }

    public function getBaseAddressOfData(): int
    {
        return (int) $this->get('baseAddressOfData');
    }

    public function getEncodingLevel(): string
    {
        return (string) $this->get('encodingLevel');
    }

    public function getDescriptiveCatalogingForm(): string
    {
        return (string) $this->get('descriptiveCatalogingForm');
    }

    public function getMultipartResourceRecordLevel(): string
    {
        return (string) $this->get('multipartResourceRecordLevel');
    }

    public function getMaterialType(): MaterialType
    {
        return MaterialType::fromLeader($this->getTypeOfRecord(), $this->getBibliographicLevel());
    }

    public function getRecordFormat(): RecordFormat
    {
        return RecordFormat::fromLeader($this->getTypeOfRecord());
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
