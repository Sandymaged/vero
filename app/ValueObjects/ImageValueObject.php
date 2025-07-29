<?php

namespace App\ValueObjects;

use App\Utiles\ImageManager;

final class ImageValueObject
{
    public $value;
    public $dir;

    public function __construct($image, $dir = 'def')
    {
        $this->value = $image;
        $this->dir = $dir;
    }

    public function __toString()
    {
        return (string)$this->value;
    }

    public function isEqualTo(self $image): bool
    {
        return $this->value == $image->value;
    }

    public function image(): string
    {
        return asset("storage/app/public/admin/def.png");
    }

}
