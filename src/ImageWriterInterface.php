<?php

namespace Francerz\Imaging;

interface ImageWriterInterface
{
    public function writeImage(Image $image, string $filename);
}
