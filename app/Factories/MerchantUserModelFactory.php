<?php

namespace App\Factories;

use App\Domain\Interfaces\Entities\IMerchantUserEntity;
use App\Domain\Interfaces\Factories\IMerchantUserFactory;
use App\Models\MerchantUser;
use App\ValueObjects\BooleanValueObject;
use App\ValueObjects\EmailValueObject;
use App\ValueObjects\ImageValueObject;
use App\ValueObjects\PasswordValueObject;

class MerchantUserModelFactory implements IMerchantUserFactory
{
    public function make(array $attributes = []): IMerchantUserEntity
    {
        if (isset($attributes['image'])) {
            $attributes['image'] = new ImageValueObject($attributes['image'], MerchantUser::IMAGE_DIR);
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

        return new MerchantUser($attributes);
    }
}
