<?php

declare(strict_types=1);

namespace Flysystem\MimeTypeDetection\Generation;

interface MimeTypeProvider
{
    /**
     * @return MimeTypeForExtension[]
     */
    public function provideMimeTypes(): array;
}
