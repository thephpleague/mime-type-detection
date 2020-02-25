<?php

declare(strict_types=1);

namespace Flysystem\MimeTypeDetection;

interface ExtensionToMimeTypeMap
{
    public function lookupMimeType(string $extension): ?string;
}
