<?php

namespace App\Domain\Interfaces\Entities;

use App\ValueObjects\ImageValueObject;
use App\ValueObjects\BooleanValueObject;
use App\ValueObjects\LocationValueObject;
use App\ValueObjects\RoleTypeValueObject;
use App\ValueObjects\UrlValueObject;

interface IRoleEntity
{
    public function getName(): string;

    public function setName(string $name): void;

    public function getGuardName(): string;

    public function setGuardName(string $name): void;

}
