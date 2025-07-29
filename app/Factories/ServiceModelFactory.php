<?php

namespace App\Factories;

use App\Domain\Interfaces\Entities\IServiceEntity;
use App\Domain\Interfaces\Factories\IServiceFactory;
use App\Models\Service;
use App\ValueObjects\BooleanValueObject;

class ServiceModelFactory implements IServiceFactory
{
    public function make(array $attributes = []): IServiceEntity
    {
        if (isset($attributes['is_active'])) {
            $attributes['is_active'] = new BooleanValueObject($attributes['is_active']);
        }

        if (isset($attributes['is_service'])) {
            $attributes['is_service'] = new BooleanValueObject($attributes['is_service']);
        }

        return new Service($attributes);
    }
}
