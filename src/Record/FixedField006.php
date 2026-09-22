<?php

declare(strict_types=1);

namespace MirayS\Marc\Record;

final class FixedField006 extends PositionalField
{
    public const LENGTH = 18;

    public function getFormOfMaterial(): string
    {
        return (string) $this->at(0);
    }

    public function getMaterialType(): MaterialType
    {
        return MaterialType::fromFormOfMaterial($this->getFormOfMaterial());
    }

    public function positions(): array
    {
        return array_merge(
            ['formOfMaterial' => [0, 1]],
            MaterialPositions::for($this->getMaterialType(), 1),
        );
    }
}
