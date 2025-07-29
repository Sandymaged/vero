<?php

namespace App\Factories;

use App\Domain\Interfaces\Entities\ISubcategoryEntity;
use App\Domain\Interfaces\Factories\ISubcategoryFactory;
use App\Models\Subcategory;
use App\ValueObjects\BooleanValueObject;

class SubcategoryModelFactory implements ISubcategoryFactory
{
    public function make(array $attributes = []): ISubcategoryEntity
    {
        if (isset($attributes['is_active'])) {
            $attributes['is_active'] = new BooleanValueObject($attributes['is_active']);
        }

        if (isset($attributes['is_service'])) {
            $attributes['is_service'] = new BooleanValueObject($attributes['is_service']);
        }

        return new Subcategory($attributes);
    }
}
