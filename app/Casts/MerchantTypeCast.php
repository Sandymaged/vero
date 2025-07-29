<?php

namespace App\Casts;

use App\ValueObjects\MerchantTypeValueObject;
use Illuminate\Contracts\Database\Eloquent\CastsAttributes;
use InvalidArgumentException;


class MerchantTypeCast implements CastsAttributes
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
    public function get($model, string $key, $value, array $attributes): MerchantTypeValueObject
    {
        return (new MerchantTypeValueObject($attributes['type']))->getText();
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
        if (! $value instanceof MerchantTypeValueObject) {
            throw new InvalidArgumentException('The given value is not an MerchantType instance.');
        }

        $model->setType($value);
    }
}
