<?php

declare(strict_types=1);

namespace MirayS\Marc\Reader;

final class StreamWrapper
{
    public $context;

    private $stream;

    public function stream_open(string $path, string $mode, int $options, ?string &$openedPath): bool
    {
        $id = parse_url($path, PHP_URL_HOST) ?: str_replace(StreamRegistry::PROTOCOL . '://', '', $path);
        $stream = StreamRegistry::get($id);

        if (!is_resource($stream)) {
            return false;
        }

        $this->stream = $stream;

        return true;
    }

    public function stream_read(int $count): string
    {
        return (string) fread($this->stream, $count);
    }

    public function stream_eof(): bool
    {
        return feof($this->stream);
    }

    public function stream_stat(): array
    {
        return fstat($this->stream) ?: [];
    }

    public function stream_seek(int $offset, int $whence = SEEK_SET): bool
    {
        return fseek($this->stream, $offset, $whence) === 0;
    }

    public function stream_tell(): int
    {
        return (int) ftell($this->stream);
    }

    public function stream_close(): void
    {
    }

    public function url_stat(string $path, int $flags): array
    {
        return [];
    }
}
