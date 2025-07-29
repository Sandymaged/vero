<?php

namespace App\Factories;

use App\Domain\Interfaces\Entities\IAdminEntity;
use App\Domain\Interfaces\Factories\IAdminFactory;
use App\Models\Admin;
use App\ValueObjects\BooleanValueObject;
use App\ValueObjects\EmailValueObject;
use App\ValueObjects\ImageValueObject;
use App\ValueObjects\PasswordValueObject;

class AdminModelFactory implements IAdminFactory
{
    public function make(array $attributes = []): IAdminEntity
    {
        if (isset($attributes['image'])) {
            $attributes['image'] = new ImageValueObject($attributes['image'], Admin::IMAGE_DIR);
        }

        if (isset($attributes['is_active'])) {
            $attributes['is_active'] = new BooleanValueObject($attributes['is_active']);
        }

        if (isset($attributes['email']) && is_string($attributes['email'])) {
            $attributes['email'] = new EmailValueObject($attributes['email']);
        }

        if (isset($attributes['password']) && is_string($attributes['password'])) {
            $attributes['password'] = new PasswordValueObject($attributes['password']);
        }

        return new Admin($attributes);
    }
}
