<?php

declare(strict_types=1);

namespace League\MimeTypeDetection;

use const FILEINFO_MIME_TYPE;

use const PATHINFO_EXTENSION;
use finfo;

class FinfoMimeTypeDetector implements MimeTypeDetector, ExtensionLookup
{
    private const INCONCLUSIVE_MIME_TYPES = [
        'application/x-empty',
        'text/plain',
        'text/x-asm',
        'application/octet-stream',
        'inode/x-empty',
    ];

    /**
     * @var finfo
     */
    private $finfo;

    /**
     * @var ExtensionToMimeTypeMap
     */
    private $extensionMap;

    /**
     * @var int|null
     */
    private $bufferSampleSize;

    /**
     * @var array<string>
     */
    private $inconclusiveMimetypes;

    /**
     * Buffer size to read from streams if no other bufferSampleSize is defined.
     */
    const STREAM_BUFFER_SAMPLE_SIZE_DEFAULT = 4100;

    public function __construct(
        string $magicFile = '',
        ExtensionToMimeTypeMap $extensionMap = null,
        ?int $bufferSampleSize = null,
        array $inconclusiveMimetypes = self::INCONCLUSIVE_MIME_TYPES
    ) {
        $this->finfo = new finfo(FILEINFO_MIME_TYPE, $magicFile);
        $this->extensionMap = $extensionMap ?: new GeneratedExtensionToMimeTypeMap();
        $this->bufferSampleSize = $bufferSampleSize;
        $this->inconclusiveMimetypes = $inconclusiveMimetypes;
    }

    public function detectMimeType(string $path, $contents): ?string
    {
        $mimeType = null;
        if (is_string($contents)) {
            $mimeType = @$this->finfo->buffer($this->takeSample($contents));
        } elseif (
            is_resource($contents)
            && get_resource_type($contents) === 'stream'
            && ($streamMetaData = stream_get_meta_data($contents))
            && !empty($streamMetaData['seekable'])
        ) {
            $mimeType = @$this->finfo->buffer($this->takeResourceSample($contents));
        }

        if ($mimeType !== null && ! in_array($mimeType, $this->inconclusiveMimetypes)) {
            return $mimeType;
        }

        return $this->detectMimeTypeFromPath($path);
    }

    public function detectMimeTypeFromPath(string $path): ?string
    {
        $extension = strtolower(pathinfo($path, PATHINFO_EXTENSION));

        return $this->extensionMap->lookupMimeType($extension);
    }

    public function detectMimeTypeFromFile(string $path): ?string
    {
        return @$this->finfo->file($path) ?: null;
    }

    public function detectMimeTypeFromBuffer(string $contents): ?string
    {
        return @$this->finfo->buffer($this->takeSample($contents)) ?: null;
    }

    private function takeSample(string $contents): string
    {
        if ($this->bufferSampleSize === null) {
            return $contents;
        }

        return (string) substr($contents, 0, $this->bufferSampleSize);
    }

    /**
     * Fetches a sample of a resource while maintaining its pointer.
     */
    private function takeResourceSample($contents): string
    {
        if (is_resource($contents) && get_resource_type($contents) === 'stream') {
            // Memory optimization: given a length stream_get_contents()
            // immediately allocates an internal buffer.
            // However, stream_copy_to_stream() reads up to the defined length
            // without pre-allocating any extra buffer.
            // Given the relatively large STREAM_BUFFER_SAMPLE_SIZE_DEFAULT this
            // avoids unnecessary memory hogging.
            $streamContentBuffer = fopen('php://temp/maxmemory:' . self::STREAM_BUFFER_SAMPLE_SIZE_DEFAULT, 'w+b');

            $streamPosition = ftell($contents);
            rewind($contents);
            stream_copy_to_stream(
                $contents,
                $streamContentBuffer,
                $this->bufferSampleSize ?? self::STREAM_BUFFER_SAMPLE_SIZE_DEFAULT,
                0
            );
            rewind($streamContentBuffer);
            $streamSample = stream_get_contents($streamContentBuffer);
            fclose($streamContentBuffer);
            fseek($contents, $streamPosition);
            return $streamSample;
        }
        return '';
    }

    public function lookupExtension(string $mimetype): ?string
    {
        return $this->extensionMap instanceof ExtensionLookup
            ? $this->extensionMap->lookupExtension($mimetype)
            : null;
    }

    public function lookupAllExtensions(string $mimetype): array
    {
        return $this->extensionMap instanceof ExtensionLookup
            ? $this->extensionMap->lookupAllExtensions($mimetype)
            : [];
    }
}
