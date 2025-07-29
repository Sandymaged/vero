<?php

namespace App\Factories;

use App\Domain\Interfaces\Factories\IUserFactory;
use App\Domain\Interfaces\Entities\IUserEntity;
use App\Models\User;
use App\ValueObjects\EmailValueObject;
use App\ValueObjects\PasswordValueObject;

class UserModelFactory implements IUserFactory
{
    public function make(array $attributes = []): IUserEntity
    {
        if (isset($attributes['email']) && is_string($attributes['email'])) {
            $attributes['email'] = new EmailValueObject($attributes['email']);
        }

        if (isset($attributes['password']) && is_string($attributes['password'])) {
            $attributes['password'] = new PasswordValueObject($attributes['password']);
        }

        return new User($attributes);
    }
}
