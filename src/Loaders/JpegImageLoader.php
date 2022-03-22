<?php

namespace Francerz\Imaging\Loaders;

use Francerz\Imaging\ImageLoaderInterface;

class JpegImageLoader implements ImageLoaderInterface
{
    /** @var string */
    private $filename;

    private function __construct()
    {
    }

    public static function fromFilename(string $filename)
    {
        $loader = new static();
        $loader->filename = $filename;
        return $loader;
    }

    public function loadImage()
    {
        return imagecreatefromjpeg($this->filename);
    }
}
