<?php

declare(strict_types=1);

namespace League\MimeTypeDetection\Generation;

class CombinedMimeTypeProvider implements MimeTypeProvider
{
    /**
     * @var MimeTypeProvider[]
     */
    private $providers;

    public function __construct(MimeTypeProvider ... $providers)
    {
        $this->providers = $providers;
    }

    public function provideMimeTypes(): array
    {
        $result = [];

        foreach ($this->providers as $provider) {
            array_push($result, ...$provider->provideMimeTypes());
        }

        return $result;
    }
}
