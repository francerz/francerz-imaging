<?php

namespace Francerz\Imaging;

use LogicException;
use RuntimeException;

class Image
{
    /** @var \GdImage */
    private $gdImage;

    private $width = 0;
    private $height = 0;

    /**
     * @param \GdImage $gdImage
     */
    public function __construct($gdImage)
    {
        $this->setGdImage($gdImage);
    }

    public function __destruct()
    {
        imagedestroy($this->gdImage);
    }

    public static function load(ImageLoaderInterface $reader)
    {
        $image = $reader->loadImage();
        if (false === $image) {
            throw new RuntimeException("Invalid image.");
        }
        return new Image($image);
    }

    /**
     * @param \GdImage $gdImage
     * @return void
     */
    private function setGdImage($gdImage)
    {
        if (version_compare(PHP_VERSION, '8.0') >= 0) {
            if (get_class($gdImage) != 'GdImage') {
                throw new LogicException("Invalid gdImage.");
            }
        }
        $this->gdImage = $gdImage;
    }

    public function getGdImage()
    {
        return $this->gdImage;
    }

    public function resize($max_width, $max_height)
    {
        $width = $this->width;
        $height = $this->height;

        if ($height > $max_height) {
            $width = ($max_height / $height) * $width;
            $height = $max_height;
        }

        if ($width > $max_width) {
            $height = ($max_width / $width) * $height;
            $width = $max_width;
        }

        $image = imagecreatetruecolor($width, $height);
        imagecopyresampled($image, $this->gdImage, 0, 0, 0, 0, $width, $height, $this->width, $this->height);

        return new Image($image);
    }
}
