<?php

declare(strict_types=1);

namespace MirayS\Marc\Reader;

use DOMDocument;
use DOMElement;
use Generator;
use MirayS\Marc\Encoding\Encoding;
use MirayS\Marc\Exception\MarcException;
use MirayS\Marc\Issue\Issue;
use MirayS\Marc\Record\ControlField;
use MirayS\Marc\Record\DataField;
use MirayS\Marc\Record\Leader;
use MirayS\Marc\Record\Record;
use MirayS\Marc\Record\Subfield;
use XMLReader;

final class MarcXmlReader extends AbstractReader
{
    public const NAMESPACE = 'http://www.loc.gov/MARC21/slim';

    private const LIBXML_FLAGS = LIBXML_NONET | LIBXML_COMPACT | LIBXML_PARSEHUGE | LIBXML_NOERROR | LIBXML_NOWARNING;

    private ?string $recordRawXml = null;

    public function __construct(
        bool $strict = false,
        int $issueLimit = 1000,
        bool $normalize = true,
        private readonly bool $captureRawXml = false,
        Encoding $encoding = Encoding::Auto,
    ) {
        parent::__construct($strict, $issueLimit, $normalize, $encoding);
    }

    /**
     * @return Generator<int, Record>
     */
    public function read(string $source): Generator
    {
        $uri = $this->resolveUri($source);
        $reader = new XMLReader();
        $previous = libxml_use_internal_errors(true);

        if (@$reader->open($uri, null, self::LIBXML_FLAGS) === false) {
            libxml_use_internal_errors($previous);

            throw new MarcException(sprintf('Cannot open MARCXML source %s', $source));
        }

        try {
            yield from $this->iterate($reader);
        } finally {
            $reader->close();
            $this->collectXmlErrors();
            libxml_use_internal_errors($previous);
        }
    }

    /**
     * @return Generator<int, Record>
     */
    public function readString(string $xml): Generator
    {
        $reader = new XMLReader();
        $previous = libxml_use_internal_errors(true);

        if (@$reader->XML($xml, null, self::LIBXML_FLAGS) === false) {
            libxml_use_internal_errors($previous);

            throw new MarcException('Cannot parse MARCXML string');
        }

        try {
            yield from $this->iterate($reader);
        } finally {
            $reader->close();
            $this->collectXmlErrors();
            libxml_use_internal_errors($previous);
        }
    }

    /**
     * @param resource $stream
     *
     * @return Generator<int, Record>
     */
    public function readStream($stream): Generator
    {
        if (!is_resource($stream)) {
            throw new MarcException('readStream() expects a stream resource');
        }

        $uri = StreamRegistry::register($stream);

        try {
            yield from $this->read($uri);
        } finally {
            StreamRegistry::release($uri);
        }
    }

    public function fromDomElement(DOMElement $element): Record
    {
        $id = $this->identifier($element);
        $offset = $this->startRecord($id);
        $record = $this->parse($element);
        $this->finishRecord($offset);

        return $record;
    }

    public function getRecordRawXml(): ?string
    {
        return $this->recordRawXml;
    }

    /**
     * @return Generator<int, Record>
     */
    private function iterate(XMLReader $reader): Generator
    {
        $document = new DOMDocument();
        $continue = $reader->read();

        while ($continue) {
            if ($reader->nodeType !== XMLReader::ELEMENT || $reader->localName !== 'record') {
                $continue = $reader->read();

                continue;
            }

            $namespace = $reader->namespaceURI;

            if ($namespace !== '' && $namespace !== self::NAMESPACE) {
                $continue = $reader->read();

                continue;
            }

            $node = $reader->expand($document);

            if (!$node instanceof DOMElement || !$this->looksLikeMarc($node)) {
                $continue = $reader->read();

                continue;
            }

            $this->recordRawXml = $this->captureRawXml ? ($node->ownerDocument?->saveXML($node) ?: null) : null;

            yield $this->fromDomElement($node);

            $continue = $reader->next();
        }
    }

    private function looksLikeMarc(DOMElement $element): bool
    {
        foreach ($element->childNodes as $child) {
            if ($child instanceof DOMElement && in_array($child->localName, ['leader', 'controlfield', 'datafield'], true)) {
                return true;
            }
        }

        return false;
    }

    private function identifier(DOMElement $element): ?string
    {
        foreach ($element->childNodes as $child) {
            if ($child instanceof DOMElement
                && $child->localName === 'controlfield'
                && $child->getAttribute('tag') === '001'
            ) {
                return trim($child->textContent);
            }
        }

        return null;
    }

    private function parse(DOMElement $element): Record
    {
        $leader = Leader::DEFAULT;
        $fields = [];

        foreach ($element->childNodes as $child) {
            if (!$child instanceof DOMElement) {
                continue;
            }

            switch ($child->localName) {
                case 'leader':
                    $leader = $this->parseLeader($child->textContent);
                    $this->useMarc8($leader);

                    break;
                case 'controlfield':
                    $field = $this->parseControlField($child);

                    if ($field !== null) {
                        $fields[] = $field;
                    }

                    break;
                case 'datafield':
                    $field = $this->parseDataField($child);

                    if ($field !== null) {
                        $fields[] = $field;
                    }

                    break;
            }
        }

        return new Record($leader, $fields);
    }

    private function parseLeader(string $leader): string
    {
        $leader = str_replace(["\n", "\r", "\t"], '', $leader);

        if (strlen($leader) !== Leader::LENGTH) {
            $this->issues->add(
                Issue::INVALID_LEADER,
                'leader',
                sprintf('Leader is %d bytes long, expected %d', strlen($leader), Leader::LENGTH),
            );
        }

        return $leader;
    }

    private function parseControlField(DOMElement $element): ?ControlField
    {
        $tag = trim($element->getAttribute('tag'));

        if ($tag === '') {
            $this->issues->add(Issue::INVALID_VALUE, 'controlfield', 'Control field without a tag');

            return null;
        }

        return new ControlField($tag, $this->value($element->textContent));
    }

    private function parseDataField(DOMElement $element): ?DataField
    {
        $tag = trim($element->getAttribute('tag'));

        if ($tag === '') {
            $this->issues->add(Issue::INVALID_VALUE, 'datafield', 'Data field without a tag');

            return null;
        }

        $subfields = [];

        foreach ($element->childNodes as $child) {
            if (!$child instanceof DOMElement || $child->localName !== 'subfield') {
                continue;
            }

            $code = $child->getAttribute('code');

            if ($code === '') {
                $this->issues->add(Issue::INVALID_VALUE, $tag, 'Subfield without a code');

                continue;
            }

            $value = $this->value($child->textContent);

            if ($value === '') {
                $this->issues->add(Issue::EMPTY_SUBFIELD, $tag . '$' . $code, 'Subfield is empty');
            }

            $subfields[] = new Subfield($code, $value);
        }

        return new DataField(
            $tag,
            $this->indicator($tag, $element->getAttribute('ind1'), 1),
            $this->indicator($tag, $element->getAttribute('ind2'), 2),
            $subfields,
        );
    }

    private function indicator(string $tag, string $value, int $number): string
    {
        if ($value === '') {
            return ' ';
        }

        if (strlen($value) !== 1) {
            $this->issues->add(
                Issue::INVALID_INDICATOR,
                sprintf('%s/ind%d', $tag, $number),
                sprintf('Indicator %s is not a single character', $value),
            );

            return substr($value . ' ', 0, 1);
        }

        return $value;
    }

    private function collectXmlErrors(): void
    {
        foreach (libxml_get_errors() as $error) {
            $this->issues->add(Issue::XML_ERROR, sprintf('line %d', $error->line), trim($error->message));
        }

        libxml_clear_errors();
    }
}
