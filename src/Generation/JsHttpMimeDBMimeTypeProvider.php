<?php

declare(strict_types=1);

namespace League\MimeTypeDetection\Generation;

class JsHttpMimeDBMimeTypeProvider implements MimeTypeProvider
{
    public function provideMimeTypes(): array
    {
        $result = [];
        $aggregated = (string) @file_get_contents('https://raw.githubusercontent.com/jshttp/mime-db/master/db.json');

        foreach (json_decode($aggregated, true) as $mimeType => $information) {
            /** @var string[] $extensions */
            $extensions = $information['extensions'] ?? [];

            foreach ($extensions as $extension) {
                $result[] = new MimeTypeForExtension($mimeType, $extension);
            }
        }

        return $result;
    }
}
