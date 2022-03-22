<?php

namespace Francerz\Imaging;

interface ImageLoaderInterface
{
    /**
     * Loads an image.
     *
     * @return \GdImage|resource|null
     */
    public function loadImage();
}
