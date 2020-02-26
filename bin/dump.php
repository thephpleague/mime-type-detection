<?php

use League\MimeTypeDetection\Generation\CombinedMimeTypeProvider;
use League\MimeTypeDetection\Generation\ExtensionToMimeTypeMapGenerator;
use League\MimeTypeDetection\Generation\FlysystemProvidedMimeTypeProvider;
use League\MimeTypeDetection\Generation\JsHttpMimeDBMimeTypeProvider;

include __DIR__.'/../vendor/autoload.php';

$dumper = new ExtensionToMimeTypeMapGenerator(
    new CombinedMimeTypeProvider(
        new JsHttpMimeDBMimeTypeProvider(),
        new FlysystemProvidedMimeTypeProvider()
    )
);

$source = $dumper->dump('GeneratedExtensionToMimeTypeMap');

file_put_contents(__DIR__ . '/../src/GeneratedExtensionToMimeTypeMap.php', $source);

