<?php

namespace Francerz\Imaging;

interface ImageSaverInterface
{
    public function saveImage(Image $image, string $filename);
}
