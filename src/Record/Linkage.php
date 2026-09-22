<?php

declare(strict_types=1);

namespace MirayS\Marc\Record;

final class Linkage
{
    public const UNLINKED_OCCURRENCE = '00';

    public function __construct(
        public readonly string $tag,
        public readonly string $occurrence,
        public readonly ?string $script = null,
        public readonly ?string $orientation = null,
    ) {
    }

    public static function fromSubfield(string $value): ?self
    {
        if (preg_match('#^(\d{3})-(\d{2})(?:/([^/]*))?(?:/(.*))?$#', trim($value), $match) !== 1) {
            return null;
        }

        return new self(
            $match[1],
            $match[2],
            ($match[3] ?? '') === '' ? null : $match[3],
            ($match[4] ?? '') === '' ? null : $match[4],
        );
    }

    public function isUnlinked(): bool
    {
        return $this->occurrence === self::UNLINKED_OCCURRENCE;
    }

    public function pointsTo(string $tag, string $occurrence): bool
    {
        return $this->tag === $tag && $this->occurrence === $occurrence && !$this->isUnlinked();
    }

    public function isRightToLeft(): bool
    {
        return $this->orientation === 'r';
    }

    public function __toString(): string
    {
        $value = $this->tag . '-' . $this->occurrence;

        if ($this->script !== null) {
            $value .= '/' . $this->script;
        }

        if ($this->orientation !== null) {
            $value .= '/' . $this->orientation;
        }

        return $value;
    }
}
