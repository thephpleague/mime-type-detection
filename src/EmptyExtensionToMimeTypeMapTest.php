<?php

declare(strict_types=1);

namespace League\MimeTypeDetection;

use PHPUnit\Framework\TestCase;

class EmptyExtensionToMimeTypeMapTest extends TestCase
{
    /**
     * @test
     */
    public function lookup_up_mimetypes_results_in_no_result(): void
    {
        $map = new EmptyExtensionToMimeTypeMap();
        $this->assertNull($map->lookupMimeType('jpg'));
        $this->assertNull($map->lookupMimeType('jpeg'));
        $this->assertNull($map->lookupMimeType('svg'));
    }
}
