<?php

namespace Francerz\Imaging\Loaders;

use Francerz\Imaging\ImageLoaderInterface;

class ImageCreator implements ImageLoaderInterface
{
    private const MODE_TRUE_COLOR = 'TRUE_COLOR';

    private $mode;
    private $width;
    private $height;

    private function __construct($mode, int $width, int $height)
    {
        $this->mode = $mode;
        $this->width = $width;
        $this->height = $height;
    }

    public static function createTrueColor(int $width, int $height)
    {
        return new static(self::MODE_TRUE_COLOR, $width, $height);
    }

    public function loadImage()
    {
        switch ($this->mode) {
            case self::MODE_TRUE_COLOR:
                return imagecreatetruecolor($this->width, $this->height);
        }
    }
}
