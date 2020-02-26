<?php

declare(strict_types=1);

namespace League\MimeTypeDetection\Generation;

interface MimeTypeProvider
{
    /**
     * @return MimeTypeForExtension[]
     */
    public function provideMimeTypes(): array;
}
