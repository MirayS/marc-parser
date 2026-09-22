<?php

declare(strict_types=1);

namespace MirayS\Marc\Record;

final class MaterialPositions
{
    /**
     * @return array<string, array{int, int}>
     */
    public static function for(MaterialType $material, int $base): array
    {
        $map = match ($material) {
            MaterialType::Books => [
                'illustrations' => [0, 4],
                'targetAudience' => [4, 1],
                'formOfItem' => [5, 1],
                'natureOfContents' => [6, 4],
                'governmentPublication' => [10, 1],
                'conferencePublication' => [11, 1],
                'festschrift' => [12, 1],
                'index' => [13, 1],
                'literaryForm' => [15, 1],
                'biography' => [16, 1],
            ],
            MaterialType::ComputerFiles => [
                'targetAudience' => [4, 1],
                'formOfItem' => [5, 1],
                'typeOfComputerFile' => [8, 1],
                'governmentPublication' => [10, 1],
            ],
            MaterialType::Maps => [
                'relief' => [0, 4],
                'projection' => [4, 2],
                'typeOfCartographicMaterial' => [7, 1],
                'governmentPublication' => [10, 1],
                'formOfItem' => [11, 1],
                'index' => [13, 1],
                'specialFormatCharacteristics' => [15, 2],
            ],
            MaterialType::Music => [
                'formOfComposition' => [0, 2],
                'formatOfMusic' => [2, 1],
                'musicParts' => [3, 1],
                'targetAudience' => [4, 1],
                'formOfItem' => [5, 1],
                'accompanyingMatter' => [6, 6],
                'literaryTextForSoundRecordings' => [12, 2],
                'transpositionAndArrangement' => [15, 1],
            ],
            MaterialType::ContinuingResources => [
                'frequency' => [0, 1],
                'regularity' => [1, 1],
                'typeOfContinuingResource' => [3, 1],
                'formOfOriginalItem' => [4, 1],
                'formOfItem' => [5, 1],
                'natureOfEntireWork' => [6, 1],
                'natureOfContents' => [7, 3],
                'governmentPublication' => [10, 1],
                'conferencePublication' => [11, 1],
                'originalAlphabetOrScriptOfTitle' => [15, 1],
                'entryConvention' => [16, 1],
            ],
            MaterialType::VisualMaterials => [
                'runningTime' => [0, 3],
                'targetAudience' => [4, 1],
                'governmentPublication' => [10, 1],
                'formOfItem' => [11, 1],
                'typeOfVisualMaterial' => [15, 1],
                'technique' => [16, 1],
            ],
            MaterialType::MixedMaterials => [
                'formOfItem' => [5, 1],
            ],
        };

        $shifted = [];

        foreach ($map as $name => [$offset, $length]) {
            $shifted[$name] = [$base + $offset, $length];
        }

        return $shifted;
    }
}
