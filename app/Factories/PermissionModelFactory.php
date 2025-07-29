<?php

namespace App\Factories;

use App\Domain\Interfaces\Entities\IPermissionEntity;
use App\Domain\Interfaces\Factories\IPermissionFactory;
use App\Models\Permission;
use App\ValueObjects\BooleanValueObject;
use App\ValueObjects\ImageValueObject;
use App\ValueObjects\PermissionTypeValueObject;
use App\ValueObjects\UrlValueObject;

class PermissionModelFactory implements IPermissionFactory
{
    public function make(array $attributes = []): IPermissionEntity
    {
        return new Permission($attributes);
    }
}
