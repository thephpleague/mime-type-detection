<?php

declare(strict_types=1);

namespace League\MimeTypeDetection\Generation;

use const PHP_EOL;

class ExtensionToMimeTypeMapGenerator
{
    /**
     * @var MimeTypeProvider
     */
    private $provider;

    public function __construct(MimeTypeProvider $provider)
    {
        $this->provider = $provider;
    }

    public function dump(string $className): string
    {
        /** @var string[] $mimeTypes */
        $mimeTypes = [];

        foreach ($this->provider->provideMimeTypes() as $mimeTypeForExtension) {
            $mimeTypes[$mimeTypeForExtension->extension()] = PHP_EOL . "        '{$mimeTypeForExtension->extension()}' => '{$mimeTypeForExtension->mimeType()}',";
        }

        ksort($mimeTypes, SORT_NATURAL);

        $template = file_get_contents(__DIR__ . '/ExtensionToMimeTypeMap.php.template');
        $template = str_replace('ExtensionToMimeTypeMapClass', $className, $template);
        $template = str_replace(' = []', ' = [' . join('', $mimeTypes) . PHP_EOL . '    ]', $template);

        return $template;
    }
}
