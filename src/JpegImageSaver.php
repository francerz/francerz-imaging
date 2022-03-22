<?php

namespace Francerz\Imaging;

use InvalidArgumentException;

class JpegImageSaver implements ImageSaverInterface
{
    private $quality = -1;

    public function setQuality(int $quality)
    {
        if ($quality < -1 && $quality > 100) {
            throw new InvalidArgumentException('Out of bound quality value');
        }
        $this->quality = $quality;
    }

    public function saveImage(Image $image, string $filename)
    {
        imagejpeg($image->getGdImage(), $filename, $this->quality);
    }
}
