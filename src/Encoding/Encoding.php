<?php

declare(strict_types=1);

namespace MirayS\Marc\Encoding;

enum Encoding: string
{
    case Auto = 'auto';
    case Marc8 = 'marc8';
    case Utf8 = 'utf8';
}
