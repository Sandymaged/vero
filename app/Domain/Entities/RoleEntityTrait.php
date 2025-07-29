<?php

namespace App\Domain\Entities;


use App\ValueObjects\BooleanValueObject;
use App\ValueObjects\ImageValueObject;
use App\ValueObjects\RoleTypeValueObject;
use App\ValueObjects\UrlValueObject;

trait RoleEntityTrait
{
    // IRoleEntity methods

    public function getName(): string
    {
        return $this->attributes['name'];
    }

    public function setName(string $name): void
    {
        $this->attributes['name'] = $name;
    }

    public function getGuardName(): string
    {
        return $this->attributes['guard_name'];
    }

    public function setGuardName(string $name): void
    {
        $this->attributes['guard_name'] = $name;
    }

}
