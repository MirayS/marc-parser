<?php

declare(strict_types=1);

namespace MirayS\Marc\Issue;

final class Issue
{
    public const XML_ERROR = 'xml_error';
    public const INVALID_LEADER = 'invalid_leader';
    public const INVALID_DIRECTORY = 'invalid_directory';
    public const INVALID_INDICATOR = 'invalid_indicator';
    public const INVALID_VALUE = 'invalid_value';
    public const EMPTY_SUBFIELD = 'empty_subfield';
    public const UNKNOWN_TAG = 'unknown_tag';
    public const UNKNOWN_SUBFIELD = 'unknown_subfield';
    public const UNKNOWN_CODE = 'unknown_code';
    public const NOT_REPEATABLE = 'not_repeatable';
    public const ENCODING = 'encoding';
    public const JSON_ERROR = 'json_error';

    public function __construct(
        public readonly string $type,
        public readonly string $path,
        public readonly string $message,
        public readonly ?string $recordId = null,
    ) {
    }

    public function __toString(): string
    {
        return sprintf('[%s] %s: %s', $this->type, $this->path, $this->message);
    }
}
