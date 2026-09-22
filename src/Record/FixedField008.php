<?php

declare(strict_types=1);

namespace MirayS\Marc\Record;

final class FixedField008 extends PositionalField
{
    public const LENGTH = 40;

    public function __construct(
        string $value,
        private readonly MaterialType $material = MaterialType::Books,
        private readonly RecordFormat $format = RecordFormat::Bibliographic,
    ) {
        parent::__construct($value);
    }

    public function getMaterialType(): MaterialType
    {
        return $this->material;
    }

    public function getRecordFormat(): RecordFormat
    {
        return $this->format;
    }

    public function positions(): array
    {
        return match ($this->format) {
            RecordFormat::Bibliographic => array_merge(
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
            ),
            RecordFormat::Authority => [
                'dateEnteredOnFile' => [0, 6],
                'directOrIndirectGeographicSubdivision' => [6, 1],
                'romanizationScheme' => [7, 1],
                'languageOfCatalog' => [8, 1],
                'kindOfRecord' => [9, 1],
                'descriptiveCatalogingRules' => [10, 1],
                'subjectHeadingSystem' => [11, 1],
                'typeOfSeries' => [12, 1],
                'numberedOrUnnumberedSeries' => [13, 1],
                'headingUseMainOrAddedEntry' => [14, 1],
                'headingUseSubjectAddedEntry' => [15, 1],
                'headingUseSeriesAddedEntry' => [16, 1],
                'typeOfSubjectSubdivision' => [17, 1],
                'typeOfGovernmentAgency' => [28, 1],
                'referenceEvaluation' => [29, 1],
                'recordUpdateInProcess' => [31, 1],
                'undifferentiatedPersonalName' => [32, 1],
                'levelOfEstablishment' => [33, 1],
                'modifiedRecord' => [38, 1],
                'catalogingSource' => [39, 1],
            ],
            RecordFormat::Holdings => [
                'dateEnteredOnFile' => [0, 6],
                'receiptOrAcquisitionStatus' => [6, 1],
                'methodOfAcquisition' => [7, 1],
                'expectedAcquisitionEndDate' => [8, 4],
                'generalRetentionPolicy' => [12, 1],
                'policyType' => [13, 1],
                'numberOfUnits' => [14, 1],
                'unitType' => [15, 1],
                'completeness' => [16, 1],
                'numberOfCopiesReported' => [17, 3],
                'lendingPolicy' => [20, 1],
                'reproductionPolicy' => [21, 1],
                'language' => [22, 3],
                'separateOrCompositeCopyReport' => [25, 1],
                'dateOfReport' => [26, 6],
            ],
            RecordFormat::Classification, RecordFormat::CommunityInformation => [
                'dateEnteredOnFile' => [0, 6],
            ],
        };
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

    public function getKindOfRecord(): ?string
    {
        return $this->trimCode($this->get('kindOfRecord'));
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
