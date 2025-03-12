<?php

declare(strict_types=1);

namespace League\MimeTypeDetection\Generation;

class FlysystemProvidedMimeTypeProvider implements MimeTypeProvider
{
    public function provideMimeTypes(): array
    {
        return [
            new MimeTypeForExtension('application/mac-binhex40', 'hqx'),
            new MimeTypeForExtension('application/mac-compactpro', 'cpt'),
            new MimeTypeForExtension('text/csv', 'csv'),
            new MimeTypeForExtension('application/octet-stream', 'phar'),
            new MimeTypeForExtension('application/octet-stream', 'bin'),
            new MimeTypeForExtension('application/octet-stream', 'dms'),
            new MimeTypeForExtension('application/octet-stream', 'lha'),
            new MimeTypeForExtension('application/octet-stream', 'lzh'),
            new MimeTypeForExtension('application/octet-stream', 'exe'),
            new MimeTypeForExtension('application/octet-stream', 'class'),
            new MimeTypeForExtension('application/x-photoshop', 'psd'),
            new MimeTypeForExtension('application/octet-stream', 'so'),
            new MimeTypeForExtension('application/octet-stream', 'sea'),
            new MimeTypeForExtension('application/octet-stream', 'dll'),
            new MimeTypeForExtension('application/oda', 'oda'),
            new MimeTypeForExtension('application/pdf', 'pdf'),
            new MimeTypeForExtension('application/illustrator', 'ai'),
            new MimeTypeForExtension('application/postscript', 'eps'),
            new MimeTypeForExtension('application/epub+zip', 'epub'),
            new MimeTypeForExtension('application/postscript', 'ps'),
            new MimeTypeForExtension('application/smil', 'smi'),
            new MimeTypeForExtension('application/smil', 'smil'),
            new MimeTypeForExtension('application/vnd.mif', 'mif'),
            new MimeTypeForExtension('application/vnd.ms-excel', 'xls'),
            new MimeTypeForExtension('application/vnd.ms-excel', 'xlt'),
            new MimeTypeForExtension('application/vnd.ms-excel', 'xla'),
            new MimeTypeForExtension('application/powerpoint', 'ppt'),
            new MimeTypeForExtension('application/vnd.ms-powerpoint', 'pot'),
            new MimeTypeForExtension('application/vnd.ms-powerpoint', 'pps'),
            new MimeTypeForExtension('application/vnd.ms-powerpoint', 'ppa'),
            new MimeTypeForExtension('application/vnd.openxmlformats-officedocument.presentationml.presentation', 'pptx'),
            new MimeTypeForExtension('application/vnd.openxmlformats-officedocument.presentationml.template', 'potx'),
            new MimeTypeForExtension('application/vnd.openxmlformats-officedocument.presentationml.slideshow', 'ppsx'),
            new MimeTypeForExtension('application/vnd.ms-powerpoint.addin.macroEnabled.12', 'ppam'),
            new MimeTypeForExtension('application/vnd.ms-powerpoint.presentation.macroEnabled.12', 'pptm'),
            new MimeTypeForExtension('application/vnd.ms-powerpoint.presentation.macroEnabled.12', 'potm'),
            new MimeTypeForExtension('application/vnd.ms-powerpoint.slideshow.macroEnabled.12', 'ppsm'),
            new MimeTypeForExtension('application/wbxml', 'wbxml'),
            new MimeTypeForExtension('application/wmlc', 'wmlc'),
            new MimeTypeForExtension('application/x-director', 'dcr'),
            new MimeTypeForExtension('application/x-director', 'dir'),
            new MimeTypeForExtension('application/x-director', 'dxr'),
            new MimeTypeForExtension('application/x-dvi', 'dvi'),
            new MimeTypeForExtension('application/x-gtar', 'gtar'),
            new MimeTypeForExtension('application/gzip', 'gzip'),
            new MimeTypeForExtension('application/x-httpd-php', 'php'),
            new MimeTypeForExtension('application/x-httpd-php', 'php4'),
            new MimeTypeForExtension('application/x-httpd-php', 'php3'),
            new MimeTypeForExtension('application/x-httpd-php', 'phtml'),
            new MimeTypeForExtension('application/x-httpd-php-source', 'phps'),
            new MimeTypeForExtension('application/javascript', 'js'),
            new MimeTypeForExtension('application/x-shockwave-flash', 'swf'),
            new MimeTypeForExtension('application/x-stuffit', 'sit'),
            new MimeTypeForExtension('application/x-tar', 'tar'),
            new MimeTypeForExtension('application/x-tar', 'tgz'),
            new MimeTypeForExtension('application/x-compress', 'z'),
            new MimeTypeForExtension('application/xhtml+xml', 'xhtml'),
            new MimeTypeForExtension('application/xhtml+xml', 'xht'),
            new MimeTypeForExtension('application/rdf+xml', 'rdf'),
            new MimeTypeForExtension('application/x-rar', 'rar'),
            new MimeTypeForExtension('audio/midi', 'mid'),
            new MimeTypeForExtension('audio/midi', 'midi'),
            new MimeTypeForExtension('audio/mpeg', 'mpga'),
            new MimeTypeForExtension('audio/mpeg', 'mp2'),
            new MimeTypeForExtension('audio/mpeg', 'mp3'),
            new MimeTypeForExtension('audio/x-aiff', 'aif'),
            new MimeTypeForExtension('audio/x-aiff', 'aiff'),
            new MimeTypeForExtension('audio/x-aiff', 'aifc'),
            new MimeTypeForExtension('audio/x-pn-realaudio', 'ram'),
            new MimeTypeForExtension('audio/x-pn-realaudio', 'rm'),
            new MimeTypeForExtension('audio/x-pn-realaudio-plugin', 'rpm'),
            new MimeTypeForExtension('audio/x-realaudio', 'ra'),
            new MimeTypeForExtension('video/vnd.rn-realvideo', 'rv'),
            new MimeTypeForExtension('audio/x-wav', 'wav'),
            new MimeTypeForExtension('image/jpeg', 'jpg'),
            new MimeTypeForExtension('image/jpeg', 'jpeg'),
            new MimeTypeForExtension('image/jpeg', 'jpe'),
            new MimeTypeForExtension('image/png', 'png'),
            new MimeTypeForExtension('image/gif', 'gif'),
            new MimeTypeForExtension('image/bmp', 'bmp'),
            new MimeTypeForExtension('image/tiff', 'tiff'),
            new MimeTypeForExtension('image/tiff', 'tif'),
            new MimeTypeForExtension('image/heic', 'heic'),
            new MimeTypeForExtension('image/svg+xml', 'svg'),
            new MimeTypeForExtension('text/css', 'css'),
            new MimeTypeForExtension('text/html', 'html'),
            new MimeTypeForExtension('text/html', 'htm'),
            new MimeTypeForExtension('text/html', 'shtml'),
            new MimeTypeForExtension('text/plain', 'txt'),
            new MimeTypeForExtension('text/plain', 'text'),
            new MimeTypeForExtension('text/plain', 'log'),
            new MimeTypeForExtension('text/richtext', 'rtx'),
            new MimeTypeForExtension('text/rtf', 'rtf'),
            new MimeTypeForExtension('application/xml', 'xml'),
            new MimeTypeForExtension('application/xml', 'xsl'),
            new MimeTypeForExtension('application/octet-stream', 'dmn'),
            new MimeTypeForExtension('application/octet-stream', 'bpmn'),
            new MimeTypeForExtension('video/mpeg', 'mpeg'),
            new MimeTypeForExtension('video/mpeg', 'mpg'),
            new MimeTypeForExtension('video/mpeg', 'mpe'),
            new MimeTypeForExtension('video/quicktime', 'qt'),
            new MimeTypeForExtension('video/quicktime', 'mov'),
            new MimeTypeForExtension('video/x-msvideo', 'avi'),
            new MimeTypeForExtension('video/x-sgi-movie', 'movie'),
            new MimeTypeForExtension('application/msword', 'doc'),
            new MimeTypeForExtension('application/vnd.openxmlformats-officedocument.wordprocessingml.document', 'docx'),
            new MimeTypeForExtension('application/vnd.ms-word.template.macroEnabled.12', 'docm'),
            new MimeTypeForExtension('application/vnd.ms-word.template.macroEnabled.12', 'dotm'),
            new MimeTypeForExtension('application/msword', 'dot'),
            new MimeTypeForExtension('application/vnd.openxmlformats-officedocument.wordprocessingml.template', 'dotx'),
            new MimeTypeForExtension('application/vnd.openxmlformats-officedocument.spreadsheetml.sheet', 'xlsx'),
            new MimeTypeForExtension('application/vnd.openxmlformats-officedocument.spreadsheetml.template', 'xltx'),
            new MimeTypeForExtension('application/vnd.ms-excel.sheet.macroEnabled.12', 'xlsm'),
            new MimeTypeForExtension('application/vnd.ms-excel.template.macroEnabled.12', 'xltm'),
            new MimeTypeForExtension('application/vnd.ms-excel.addin.macroEnabled.12', 'xlam'),
            new MimeTypeForExtension('application/vnd.ms-excel.sheet.binary.macroEnabled.12', 'xlsb'),
            new MimeTypeForExtension('application/msword', 'word'),
            new MimeTypeForExtension('application/excel', 'xl'),
            new MimeTypeForExtension('message/rfc822', 'eml'),
            new MimeTypeForExtension('application/json', 'json'),
            new MimeTypeForExtension('application/x-x509-user-cert', 'pem'),
            new MimeTypeForExtension('application/x-pkcs10', 'p10'),
            new MimeTypeForExtension('application/x-pkcs12', 'p12'),
            new MimeTypeForExtension('application/x-pkcs7-signature', 'p7a'),
            new MimeTypeForExtension('application/pkcs7-mime', 'p7c'),
            new MimeTypeForExtension('application/pkcs7-mime', 'p7m'),
            new MimeTypeForExtension('application/x-pkcs7-certreqresp', 'p7r'),
            new MimeTypeForExtension('application/pkcs7-signature', 'p7s'),
            new MimeTypeForExtension('application/x-x509-ca-cert', 'crt'),
            new MimeTypeForExtension('application/pkix-crl', 'crl'),
            new MimeTypeForExtension('application/x-x509-ca-cert', 'der'),
            new MimeTypeForExtension('application/octet-stream', 'kdb'),
            new MimeTypeForExtension('application/pgp', 'pgp'),
            new MimeTypeForExtension('application/gpg-keys', 'gpg'),
            new MimeTypeForExtension('application/octet-stream', 'sst'),
            new MimeTypeForExtension('application/octet-stream', 'csr'),
            new MimeTypeForExtension('application/x-pkcs7', 'rsa'),
            new MimeTypeForExtension('application/pkix-cert', 'cer'),
            new MimeTypeForExtension('video/3gpp2', '3g2'),
            new MimeTypeForExtension('video/3gp', '3gp'),
            new MimeTypeForExtension('video/mp4', 'mp4'),
            new MimeTypeForExtension('audio/x-m4a', 'm4a'),
            new MimeTypeForExtension('video/mp4', 'f4v'),
            new MimeTypeForExtension('video/webm', 'webm'),
            new MimeTypeForExtension('audio/x-aac', 'aac'),
            new MimeTypeForExtension('audio/acc', 'aac'),
            new MimeTypeForExtension('application/vnd.mpegurl', 'm4u'),
            new MimeTypeForExtension('text/plain', 'm3u'),
            new MimeTypeForExtension('application/xspf+xml', 'xspf'),
            new MimeTypeForExtension('application/videolan', 'vlc'),
            new MimeTypeForExtension('video/x-ms-wmv', 'wmv'),
            new MimeTypeForExtension('audio/x-au', 'au'),
            new MimeTypeForExtension('audio/ac3', 'ac3'),
            new MimeTypeForExtension('audio/x-flac', 'flac'),
            new MimeTypeForExtension('audio/ogg', 'ogg'),
            new MimeTypeForExtension('application/vnd.google-earth.kmz', 'kmz'),
            new MimeTypeForExtension('application/vnd.google-earth.kml+xml', 'kml'),
            new MimeTypeForExtension('text/calendar', 'ics'),
            new MimeTypeForExtension('text/x-scriptzsh', 'zsh'),
            new MimeTypeForExtension('application/x-7z-compressed', '7zip'),
            new MimeTypeForExtension('application/cdr', 'cdr'),
            new MimeTypeForExtension('audio/x-ms-wma', 'wma'),
            new MimeTypeForExtension('application/java-archive', 'jar'),
            new MimeTypeForExtension('application/x-tex', 'tex'),
            new MimeTypeForExtension('application/x-latex', 'latex'),
            new MimeTypeForExtension('application/vnd.oasis.opendocument.text', 'odt'),
            new MimeTypeForExtension('application/vnd.oasis.opendocument.spreadsheet', 'ods'),
            new MimeTypeForExtension('application/vnd.oasis.opendocument.presentation', 'odp'),
            new MimeTypeForExtension('application/vnd.oasis.opendocument.graphics', 'odg'),
            new MimeTypeForExtension('application/vnd.oasis.opendocument.chart', 'odc'),
            new MimeTypeForExtension('application/vnd.oasis.opendocument.formula', 'odf'),
            new MimeTypeForExtension('application/vnd.oasis.opendocument.image', 'odi'),
            new MimeTypeForExtension('application/vnd.oasis.opendocument.text-master', 'odm'),
            new MimeTypeForExtension('application/vnd.oasis.opendocument.database', 'odb'),
            new MimeTypeForExtension('application/vnd.oasis.opendocument.text-template', 'ott'),
            new MimeTypeForExtension('application/STEP', 'step'),
            new MimeTypeForExtension('application/STEP', 'stp'),
            new MimeTypeForExtension('application/x-ndjson', 'ndjson'),
            new MimeTypeForExtension('application/octet-stream', 'dst'),
            new MimeTypeForExtension('application/octet-stream', 'pv'),
            new MimeTypeForExtension('application/octet-stream', 'pxf'),
            new MimeTypeForExtension('application/braille', 'brf'),
            new MimeTypeForExtension('font/ttf', 'ttf'),
            new MimeTypeForExtension('font/otf', 'otf'),
        ];
    }
}
