<?php

declare(strict_types=1);

namespace MirayS\Marc\Record;

final class FixedField008 extends PositionalField
{
    public const LENGTH = 40;

    public function __construct(string $value, private readonly MaterialType $material = MaterialType::Books)
    {
        parent::__construct($value);
    }

    public function getMaterialType(): MaterialType
    {
        return $this->material;
    }

    public function positions(): array
    {
        return array_merge(
            [
                'dateEnteredOnFile' => [0, 6],
                'typeOfDate' => [6, 1],
                'date1' => [7, 4],
                'date2' => [11, 4],
                'placeOfPublication' => [15, 3],
            ],
            MaterialPositions::for($this->material, 18),
            [
                'language' => [35, 3],
                'modifiedRecord' => [38, 1],
                'catalogingSource' => [39, 1],
            ],
        );
    }

    public function getDateEnteredOnFile(): ?string
    {
        return $this->get('dateEnteredOnFile');
    }

    public function getTypeOfDate(): ?string
    {
        return $this->get('typeOfDate');
    }

    public function getDate1(): ?string
    {
        return $this->normalizeDate($this->get('date1'));
    }

    public function getDate2(): ?string
    {
        return $this->normalizeDate($this->get('date2'));
    }

    public function getPlaceOfPublication(): ?string
    {
        return $this->trimCode($this->get('placeOfPublication'));
    }

    public function getLanguage(): ?string
    {
        return $this->trimCode($this->get('language'));
    }

    public function getTargetAudience(): ?string
    {
        return $this->trimCode($this->get('targetAudience'));
    }

    public function getFormOfItem(): ?string
    {
        return $this->trimCode($this->get('formOfItem'));
    }

    public function getLiteraryForm(): ?string
    {
        return $this->trimCode($this->get('literaryForm'));
    }

    public function getGovernmentPublication(): ?string
    {
        return $this->trimCode($this->get('governmentPublication'));
    }

    private function normalizeDate(?string $date): ?string
    {
        if ($date === null) {
            return null;
        }

        $date = trim($date);

        return preg_match('/^\d{4}$/', $date) === 1 ? $date : null;
    }

    private function trimCode(?string $code): ?string
    {
        if ($code === null) {
            return null;
        }

        $code = trim(str_replace(['|', '#'], ['', ' '], $code));

        return $code === '' ? null : $code;
    }
}
