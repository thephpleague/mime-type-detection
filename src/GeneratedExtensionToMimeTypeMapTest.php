<?php

declare(strict_types=1);

namespace League\MimeTypeDetection;

use Generator;
use PHPUnit\Framework\TestCase;

class GeneratedExtensionToMimeTypeMapTest extends TestCase
{
    /**
     * @test
     * @dataProvider expectedLookupResults
     */
    public function looking_up_mimetypes(string $extension, ?string $expectedMimeType): void
    {
        $map = new GeneratedExtensionToMimeTypeMap();
        $actual = $map->lookupMimeType($extension);
        $this->assertEquals($expectedMimeType, $actual);
    }

    public function expectedLookupResults(): Generator
    {
        yield ['jpg', 'image/jpeg'];
        yield ['svg', 'image/svg+xml'];
        yield ['lol', null];
    }
}
