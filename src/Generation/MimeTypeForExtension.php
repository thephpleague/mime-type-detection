<?php

declare(strict_types=1);

namespace League\MimeTypeDetection\Generation;

class MimeTypeForExtension
{
    /**
     * @var string
     */
    private $mimeType;

    /**
     * @var string
     */
    private $extension;

    public function __construct(string $mimeType, string $extension)
    {
        $this->mimeType = $mimeType;
        $this->extension = $extension;
    }

    public function mimeType(): string
    {
        return $this->mimeType;
    }

    public function extension(): string
    {
        return $this->extension;
    }
}
