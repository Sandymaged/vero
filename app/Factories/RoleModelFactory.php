<?php

namespace App\Factories;

use App\Domain\Interfaces\Entities\IRoleEntity;
use App\Domain\Interfaces\Factories\IRoleFactory;
use App\Models\Role;
use App\ValueObjects\BooleanValueObject;
use App\ValueObjects\ImageValueObject;
use App\ValueObjects\RoleTypeValueObject;
use App\ValueObjects\UrlValueObject;

class RoleModelFactory implements IRoleFactory
{
    public function make(array $attributes = []): IRoleEntity
    {
        return new Role($attributes);
    }
}
