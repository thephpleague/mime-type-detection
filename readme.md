## League Mime Type Detection

[![Author](https://img.shields.io/badge/author-@frankdejonge-blue.svg)](https://twitter.com/frankdejonge)
[![Source Code](https://img.shields.io/badge/source-league%2Fmime--type--detection-blue.svg)](https://github.com/thephpleague/mime-type-detection)
[![Latest Version](https://img.shields.io/github/tag/thephpleague/mime-type-detection.svg)](https://github.com/thephpleague/mime-type-detection/releases)
[![Software License](https://img.shields.io/badge/license-MIT-brightgreen.svg)](https://github.com/thephpleague/mime-type-detection/blob/master/LICENSE)
[![Build Status](https://travis-ci.com/thephpleague/mime-type-detection.svg?branch=master)](https://travis-ci.com/thephpleague/mime-type-detection)
[![Coverage Status](https://img.shields.io/scrutinizer/coverage/g/thephpleague/mime-type-detection.svg)](https://scrutinizer-ci.com/g/thephpleague/mime-type-detection/code-structure)
[![Quality Score](https://img.shields.io/scrutinizer/g/thephpleague/mime-type-detection.svg)](https://scrutinizer-ci.com/g/thephpleague/mime-type-detection)
[![Total Downloads](https://img.shields.io/packagist/dt/league/mime-type-detection.svg)](https://packagist.org/packages/league/mime-type-detection)
![php 7.2+](https://img.shields.io/badge/php-min%207.2-red.svg)


This package supplies a generic mime-type detection interface with a
`finfo` based implementation.

## Usage

```bash
composer require league/mime-type-detection
```

## Consumer interface

Your code is advised to couple to the following interfaces:

- `League\MimetypeDetection\MimeTypeDetector`<br/>
  This contract is used to detect mimetypes based on file names and file contents.
- `League\MimetypeDetection\ExtensionLookup`<br/>
  This contract is used to lookup one or all mimetypes for a given file extension.
  Added in `1.13.0`.

### Detectors

Finfo with extension fallback:

```php
$detector = new League\MimeTypeDetection\FinfoMimeTypeDetector();

// Detect by contents, fall back to detection by extension.
$mimeType = $detector->detectMimeType('some/path.php', 'string contents');

// Detect by contents only, no extension fallback.
$mimeType = $detector->detectMimeTypeFromBuffer('string contents');

// Detect by actual file, no extension fallback.
$mimeType = $detector->detectMimeTypeFromFile('existing/path.php');

// Only detect by extension
$mimeType = $detector->detectMimeTypeFromPath('any/path.php');

// Constructor options
$detector = new League\MimeTypeDetection\FinfoMimeTypeDetector(
  $pathToMimeDatabase, // Custom mime database location, default: ''
  $customExtensionMap, // Custom extension fallback mapp, default: null
  $bufferSampleSize // Buffer size limit, used to take a sample (substr) from the input buffer to reduce memory consumption.
);
```

Extension only:

```php
$detector = new League\MimeTypeDetection\ExtensionMimeTypeDetector();

// Only detect by extension, ignores the file contents
$mimeType = $detector->detectMimeType('some/path.php', 'string contents');

// Always returns null
$mimeType = $detector->detectMimeTypeFromBuffer('string contents');

// Only detect by extension
$mimeType = $detector->detectMimeTypeFromFile('existing/path.php');

// Only detect by extension
$mimeType = $detector->detectMimeTypeFromPath('any/path.php');
```

## Extension lookup by mime-type

> This feature was added in version `1.13.0`

The various implementations can look up the extensions that can be used for
a given mime-type.

```
// string | null
$extension = $detector->lookupExtension($mime$type);

// array<string>
$allExtensions = $detector->lookupAllExtensions($mimeType);
```

## Extension mime-type lookup

As a fallback for `finfo` based lookup, an extension map
is used to determine the mime-type. There is an advised implementation
shipped, which is generated from information collected by the npm
package [mime-db](https://www.npmjs.com/package/mime-db).

### Provided extension maps

Generated:

```php
$map = new League\MimeTypeDetection\GeneratedExtensionToMimeTypeMap();

// string mime-type or NULL
$mimeType = $map->lookupMimeType('png');
```

Overriding decorator

```php
$innerMap = new League\MimeTypeDetection\GeneratedExtensionToMimeTypeMap();
$map = new League\MimeTypeDetection\OverridingExtensionToMimeTypeMap($innerMap, ['png' => 'custom/mimetype']);

// string "custom/mimetype"
$mimeType = $map->lookupMimeType('png');
```

Empty:

```php
$map = new League\MimeTypeDetection\EmptyExtensionToMimeTypeMap();

// Always returns NULL
$mimeType = $map->lookupMimeType('png');
```
