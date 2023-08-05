<?php

declare(strict_types=1);

namespace League\MimeTypeDetection;

use Generator;
use League\MimeTypeDetection\Generation\CombinedMimeTypeProvider;
use League\MimeTypeDetection\Generation\ExtensionToMimeTypeMapGenerator;
use League\MimeTypeDetection\Generation\FlysystemProvidedMimeTypeProvider;
use League\MimeTypeDetection\Generation\JsHttpMimeDBMimeTypeProvider;
use PHPUnit\Framework\TestCase;

class GeneratedExtensionToMimeTypeMapTest extends TestCase
{
    /**
     * @test
     *
     * @dataProvider expectedLookupResults
     */
    public function looking_up_mimetypes(string $extension, ?string $expectedMimeType): void
    {
        $map = new GeneratedExtensionToMimeTypeMap();
        $actual = $map->lookupMimeType($extension);
        $this->assertEquals($expectedMimeType, $actual);
    }

    public static function expectedLookupResults(): Generator
    {
        yield ['jpg', 'image/jpeg'];
        yield ['svg', 'image/svg+xml'];
        yield ['lol', null];
    }

    /**
     * @test
     */
    public function the_generated_map_should_be_up_to_date(): void
    {
        $dumper = new ExtensionToMimeTypeMapGenerator(
            new CombinedMimeTypeProvider(
                new JsHttpMimeDBMimeTypeProvider(),
                new FlysystemProvidedMimeTypeProvider()
            )
        );

        $source = $dumper->dump('GeneratedExtensionToMimeTypeMap');

        $storedSource = file_get_contents(__DIR__ . '/GeneratedExtensionToMimeTypeMap.php');

        $this->assertEquals($source, $storedSource);
    }

    /**
     * @test
     *
     * @dataProvider expectedExtensionResults
     *
     * @param string $mimeType
     * @param string[] $expectedExtensions
     */
    public function looking_up_extensions(string $mimeType, array $expectedExtensions): void
    {
        // arrange
        $map = new GeneratedExtensionToMimeTypeMap();

        // act
        $actual = $map->lookupAllExtensions($mimeType);

        // assert
        $this->assertEquals($expectedExtensions, $actual);
    }

    public static function expectedExtensionResults(): Generator
    {
        yield ['application/vnd.openxmlformats-officedocument.wordprocessingml.document', ['docx']];
        yield ['image/jpeg', ['jpeg', 'jpg', 'jpe']];
        yield ['image/svg+xml', ['svg', 'svgz']];
        yield ['lol/lol', []];
    }
}
