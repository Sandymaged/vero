<?php

namespace App\Casts;

use App\ValueObjects\LocationValueObject;
use App\ValueObjects\MerchantTypeValueObject;
use Illuminate\Contracts\Database\Eloquent\CastsAttributes;
use InvalidArgumentException;


class LocationCast implements CastsAttributes
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
    public function get($model, string $key, $value, array $attributes): string
    {
        return (new LocationValueObject($attributes['location']))->location();
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
        if (!$value instanceof LocationValueObject) {
            throw new InvalidArgumentException('The given value is not an Location instance.');
        }

        $model->setLocation($value);
    }
}
