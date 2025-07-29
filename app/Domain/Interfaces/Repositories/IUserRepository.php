<?php

namespace App\Domain\Interfaces\Repositories;

use App\Domain\Interfaces\Entities\IUserEntity;
use App\ValueObjects\PasswordValueObject;

interface IUserRepository
{
    public function exists(IUserEntity $user): bool;

    public function create(IUserEntity $user, PasswordValueObject $password): IUserEntity;
}
