<?php

declare(strict_types=1);

namespace MirayS\Marc\Record;

interface Field extends \Stringable
{
    public function getTag(): string;

    public function isControlField(): bool;
}
