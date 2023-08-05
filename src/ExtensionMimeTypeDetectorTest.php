<?php

declare(strict_types=1);

namespace League\MimeTypeDetection;

use Generator;
use PHPUnit\Framework\TestCase;

class ExtensionMimeTypeDetectorTest extends TestCase
{
    /**
     * @test
     *
     * @dataProvider expectedLookupResults
     */
    public function looking_up_mimetype(string $path, ?string $expectedMimeType): void
    {
        $detector = new ExtensionMimeTypeDetector();
        $this->assertEquals($expectedMimeType, $detector->detectMimeType($path, 'contents'));
        $this->assertEquals($expectedMimeType, $detector->detectMimeTypeFromFile($path));
        $this->assertEquals($expectedMimeType, $detector->detectMimeTypeFromPath($path));
    }

    /**
     * @test
     */
    public function detecting_from_bugger_always_returns_null(): void
    {
        $detector = new ExtensionMimeTypeDetector();
        /** @var string $contents */
        $contents = file_get_contents(__DIR__ . '/../test_files/flysystem.svg');

        $mimeType = $detector->detectMimeTypeFromBuffer($contents);

        $this->assertNull($mimeType);
    }

    public static function expectedLookupResults(): Generator
    {
        yield ['thing.jpg', 'image/jpeg'];
        yield ['file.svg', 'image/svg+xml'];
        yield ['nothing.lol', null];
    }
}
