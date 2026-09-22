<?php

declare(strict_types=1);

namespace MirayS\Marc\Record;

final class FixedField007 extends PositionalField
{
    public function getCategoryOfMaterial(): string
    {
        return (string) $this->at(0);
    }

    public function getSpecificMaterialDesignation(): ?string
    {
        return $this->at(1);
    }

    public function positions(): array
    {
        $common = [
            'categoryOfMaterial' => [0, 1],
            'specificMaterialDesignation' => [1, 1],
        ];

        return array_merge($common, match ($this->getCategoryOfMaterial()) {
            'a' => [
                'color' => [3, 1],
                'physicalMedium' => [4, 1],
                'typeOfReproduction' => [5, 1],
                'productionDetails' => [6, 1],
                'polarity' => [7, 1],
            ],
            'c' => [
                'color' => [3, 1],
                'dimensions' => [4, 1],
                'sound' => [5, 1],
                'imageBitDepth' => [6, 3],
                'fileFormats' => [9, 1],
                'qualityAssuranceTargets' => [10, 1],
                'antecedentSource' => [11, 1],
                'levelOfCompression' => [12, 1],
                'reformattingQuality' => [13, 1],
            ],
            'd' => [
                'color' => [3, 1],
                'physicalMedium' => [4, 1],
                'typeOfReproduction' => [5, 1],
            ],
            'f' => [
                'classOfBrailleWriting' => [3, 2],
                'levelOfContraction' => [5, 1],
                'brailleMusicFormat' => [6, 3],
                'specificPhysicalCharacteristics' => [9, 1],
            ],
            'g' => [
                'color' => [3, 1],
                'baseOfEmulsion' => [4, 1],
                'soundOnMediumOrSeparate' => [5, 1],
                'mediumForSound' => [6, 1],
                'dimensions' => [7, 1],
                'secondarySupportMaterial' => [8, 1],
            ],
            'h' => [
                'positiveNegativeAspect' => [3, 1],
                'dimensions' => [4, 1],
                'reductionRatioRange' => [5, 1],
                'reductionRatio' => [6, 3],
                'color' => [9, 1],
                'emulsionOnFilm' => [10, 1],
                'generation' => [11, 1],
                'baseOfFilm' => [12, 1],
            ],
            'k' => [
                'color' => [3, 1],
                'primarySupportMaterial' => [4, 1],
                'secondarySupportMaterial' => [5, 1],
            ],
            'm' => [
                'color' => [3, 1],
                'motionPicturePresentationFormat' => [4, 1],
                'soundOnMediumOrSeparate' => [5, 1],
                'mediumForSound' => [6, 1],
                'dimensions' => [7, 1],
                'configurationOfPlaybackChannels' => [8, 1],
                'productionElements' => [9, 1],
                'positiveNegativeAspect' => [10, 1],
                'generation' => [11, 1],
                'baseOfFilm' => [12, 1],
                'refinedCategoriesOfColor' => [13, 1],
                'kindOfColorStockOrPrint' => [14, 1],
                'deteriorationStage' => [15, 1],
                'completeness' => [16, 1],
                'filmInspectionDate' => [17, 6],
            ],
            'q' => [],
            'r' => [
                'altitudeOfSensor' => [3, 1],
                'attitudeOfSensor' => [4, 1],
                'cloudCover' => [5, 1],
                'platformConstructionType' => [6, 1],
                'platformUseCategory' => [7, 1],
                'sensorType' => [8, 1],
                'dataType' => [9, 2],
            ],
            's' => [
                'speed' => [3, 1],
                'configurationOfPlaybackChannels' => [4, 1],
                'grooveWidthOrPitch' => [5, 1],
                'dimensions' => [6, 1],
                'tapeWidth' => [7, 1],
                'tapeConfiguration' => [8, 1],
                'kindOfDiscCylinderOrTape' => [9, 1],
                'kindOfMaterial' => [10, 1],
                'kindOfCuttingOfDisc' => [11, 1],
                'specialPlaybackCharacteristics' => [12, 1],
                'originalCaptureAndStorageTechnique' => [13, 1],
            ],
            'v' => [
                'color' => [3, 1],
                'videorecordingFormat' => [4, 1],
                'soundOnMediumOrSeparate' => [5, 1],
                'mediumForSound' => [6, 1],
                'dimensions' => [7, 1],
                'configurationOfPlaybackChannels' => [8, 1],
            ],
            default => [],
        });
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
