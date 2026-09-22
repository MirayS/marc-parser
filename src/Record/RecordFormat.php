<?php

declare(strict_types=1);

namespace MirayS\Marc\Record;

enum RecordFormat: string
{
    case Bibliographic = 'bibliographic';
    case Authority = 'authority';
    case Holdings = 'holdings';
    case Classification = 'classification';
    case CommunityInformation = 'community';

    public static function fromLeader(string $typeOfRecord): self
    {
        return match ($typeOfRecord) {
            'z' => self::Authority,
            'u', 'v', 'x', 'y' => self::Holdings,
            'w' => self::Classification,
            'q' => self::CommunityInformation,
            default => self::Bibliographic,
        };
    }
}
