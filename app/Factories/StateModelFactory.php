<?php

namespace App\Factories;

use App\Domain\Interfaces\Entities\IStateEntity;
use App\Domain\Interfaces\Factories\IStateFactory;
use App\Models\State;
use App\ValueObjects\BooleanValueObject;

class StateModelFactory implements IStateFactory
{
    public function make(array $attributes = []): IStateEntity
    {
        if (isset($attributes['is_active'])) {
            $attributes['is_active'] = new BooleanValueObject($attributes['is_active']);
        }

        return new State($attributes);
    }
}
