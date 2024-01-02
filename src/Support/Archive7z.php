<?php

namespace ScaleXY\Tools\Support;

class Archive7z extends \Archive7z\Archive7z
{
	protected ?float $timeout = 7000;
	// protected int $compressionLevel = 9;
	// protected string $overwriteMode = self::OVERWRITE_MODE_S;
	// protected string $outputDirectory = '/path/to/custom/output/directory';

	public function setCompression($compressionLevel)
	{
		$this->compressionLevel = $compressionLevel;
	}
}
