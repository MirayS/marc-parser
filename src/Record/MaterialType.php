<?php

declare(strict_types=1);

namespace MirayS\Marc\Record;

enum MaterialType: string
{
    case Books = 'BK';
    case ComputerFiles = 'CF';
    case Maps = 'MP';
    case Music = 'MU';
    case ContinuingResources = 'CR';
    case VisualMaterials = 'VM';
    case MixedMaterials = 'MX';

    public static function fromLeader(string $typeOfRecord, string $bibliographicLevel): self
    {
        return match ($typeOfRecord) {
            'c', 'd', 'i', 'j' => self::Music,
            'e', 'f' => self::Maps,
            'g', 'k', 'o', 'r' => self::VisualMaterials,
            'm' => self::ComputerFiles,
            'p' => self::MixedMaterials,
            default => in_array($bibliographicLevel, ['b', 'i', 's'], true) ? self::ContinuingResources : self::Books,
        };
    }

    public static function fromFormOfMaterial(string $code): self
    {
        return match ($code) {
            'c', 'd', 'i', 'j' => self::Music,
            'e', 'f' => self::Maps,
            'g', 'k', 'o', 'r' => self::VisualMaterials,
            'm' => self::ComputerFiles,
            'p' => self::MixedMaterials,
            's' => self::ContinuingResources,
            default => self::Books,
        };
    }
}
