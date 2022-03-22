<?php

namespace Francerz\Imaging\Writers;

use Francerz\Imaging\Image;
use Francerz\Imaging\ImageWriterInterface;
use InvalidArgumentException;

class JpegImageWriter implements ImageWriterInterface
{
    private $quality = -1;

    public function setQuality(int $quality)
    {
        if ($quality < -1 && $quality > 100) {
            throw new InvalidArgumentException('Out of bound quality value');
        }
        $this->quality = $quality;
    }

    public function writeImage(Image $image, string $filename)
    {
        imagejpeg($image->getGdImage(), $filename, $this->quality);
    }
}
