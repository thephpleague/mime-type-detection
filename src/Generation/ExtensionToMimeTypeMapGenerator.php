<?php

declare(strict_types=1);

namespace League\MimeTypeDetection\Generation;

use const PHP_EOL;
use function array_unique;
use function join;

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
        $reverseLookup = [];
        $compiledReverseLookup = [];

        foreach ($this->provider->provideMimeTypes() as $mimeTypeForExtension) {
            $mimeTypes[$mimeTypeForExtension->extension()] = PHP_EOL . "        '{$mimeTypeForExtension->extension()}' => '{$mimeTypeForExtension->mimeType()}',";
            $extensions = $reverseLookup[$mimeTypeForExtension->mimeType()] ?? [];
            $extensions[] = $mimeTypeForExtension->extension();
            $reverseLookup[$mimeTypeForExtension->mimeType()] = $extensions;
            $extensionsAsCode = '[\'' . join('\', \'', array_unique($extensions)) . '\']';
            $compiledReverseLookup[$mimeTypeForExtension->mimeType()] = PHP_EOL . "        '{$mimeTypeForExtension->mimeType()}' => $extensionsAsCode,";
        }

        ksort($mimeTypes, SORT_NATURAL);

        $template = file_get_contents(__DIR__ . '/ExtensionToMimeTypeMap.php.template');
        $template = str_replace('ExtensionToMimeTypeMapClass', $className, $template);
        $template = str_replace(' = [\'ext2mime\']', ' = [' . join('', $mimeTypes) . PHP_EOL . '    ]', $template);
        $template = str_replace(' = [\'mime2ext\']', ' = [' . join('', $compiledReverseLookup) . PHP_EOL . '    ]', $template);

        return $template;
    }
}
