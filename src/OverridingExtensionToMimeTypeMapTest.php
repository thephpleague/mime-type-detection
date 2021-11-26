<?php

namespace League\MimeTypeDetection;

use PHPUnit\Framework\TestCase;

class OverridingExtensionToMimeTypeMapTest extends TestCase
{
    /**
     * @test
     */
    public function overriding_a_mime_type_value(): void
    {
        $innerMap = new GeneratedExtensionToMimeTypeMap();
        $overridingMap = new OverridingExtensionToMimeTypeMap($innerMap, ['mp3' => 'custom/value']);

        $mp3 = $overridingMap->lookupMimeType('mp3');
        $mp4 = $overridingMap->lookupMimeType('mp4');

        self::assertEquals('custom/value', $mp3);
        self::assertEquals('video/mp4', $mp4);
    }
}
