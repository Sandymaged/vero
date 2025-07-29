<?php

namespace App\Casts;

use App\ValueObjects\ImageValueObject;
use Illuminate\Contracts\Database\Eloquent\CastsAttributes;
use InvalidArgumentException;


class ImageCast implements CastsAttributes
{
    /**
     * Cast the given value.
     *
     * @param \Illuminate\Database\Eloquent\Model $model
     * @param string $key
     * @param mixed $value
     * @param array $attributes
     * @return mixed
     */
    public function get($model, string $key, $value, array $attributes): ImageValueObject
    {
        return new ImageValueObject($attributes['image']);
    }

    /**
     * Prepare the given value for storage.
     *
     * @param \Illuminate\Database\Eloquent\Model $model
     * @param string $key
     * @param mixed $value
     * @param array $attributes
     * @return mixed
     */
    public function set($model, string $key, $value, array $attributes)
    {
        if (! $value instanceof ImageValueObject) {
            throw new InvalidArgumentException('The given value is not an Image instance.');
        }

        $model->setImage($value);
    }
}
