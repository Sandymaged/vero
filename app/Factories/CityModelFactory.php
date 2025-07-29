<?php

namespace App\Factories;

use App\Domain\Interfaces\Entities\ICityEntity;
use App\Domain\Interfaces\Factories\ICityFactory;
use App\Models\City;
use App\ValueObjects\BooleanValueObject;

class CityModelFactory implements ICityFactory
{
    public function make(array $attributes = []): ICityEntity
    {
        if (isset($attributes['is_active'])) {
            $attributes['is_active'] = new BooleanValueObject($attributes['is_active']);
        }

        return new City($attributes);
    }
}
