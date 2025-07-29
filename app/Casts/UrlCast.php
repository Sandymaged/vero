<?php

namespace App\Casts;

use App\ValueObjects\UrlValueObject;
use Illuminate\Contracts\Database\Eloquent\CastsAttributes;
use InvalidArgumentException;


class UrlCast implements CastsAttributes
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
    public function get($model, string $key, $value, array $attributes): UrlValueObject
    {
        return new UrlValueObject($attributes['url']);
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
        if (! $value instanceof UrlValueObject) {
            throw new InvalidArgumentException('The given value is not an Url instance.');
        }

        $model->setUrl($value);
    }
}
