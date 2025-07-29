<?php

namespace App\Factories;

use App\Domain\Interfaces\Entities\ICategoryEntity;
use App\Domain\Interfaces\Factories\ICategoryFactory;
use App\Models\Category;
use App\ValueObjects\BooleanValueObject;

class CategoryModelFactory implements ICategoryFactory
{
    public function make(array $attributes = []): ICategoryEntity
    {
        if (isset($attributes['is_active'])) {
            $attributes['is_active'] = new BooleanValueObject($attributes['is_active']);
        }

        if (isset($attributes['is_service'])) {
            $attributes['is_service'] = new BooleanValueObject($attributes['is_service']);
        }

        return new Category($attributes);
    }
}
