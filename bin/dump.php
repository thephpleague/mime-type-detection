<?php

use Flysystem\MimeTypeDetection\Generation\CombinedMimeTypeProvider;
use Flysystem\MimeTypeDetection\Generation\ExtensionToMimeTypeMapGenerator;
use Flysystem\MimeTypeDetection\Generation\FlysystemProvidedMimeTypeProvider;
use Flysystem\MimeTypeDetection\Generation\JsHttpMimeDBMimeTypeProvider;

include __DIR__.'/../vendor/autoload.php';

$dumper = new ExtensionToMimeTypeMapGenerator(
    new CombinedMimeTypeProvider(
        new JsHttpMimeDBMimeTypeProvider(),
        new FlysystemProvidedMimeTypeProvider()
    )
);

$source = $dumper->dump('GeneratedExtensionToMimeTypeMap');

file_put_contents(__DIR__ . '/../src/GeneratedExtensionToMimeTypeMap.php', $source);

