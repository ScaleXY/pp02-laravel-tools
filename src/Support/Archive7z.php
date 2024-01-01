<?php

namespace ScaleXY\Tools\Support;

class Archive7z extends \Archive7z\Archive7z
{
    protected $timeout = 7000;
    protected $compressionLevel = 9;
    protected $overwriteMode = self::OVERWRITE_MODE_S;
    protected $outputDirectory = '/path/to/custom/output/directory';
}
