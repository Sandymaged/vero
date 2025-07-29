<?php

namespace App\Factories;

use App\Domain\Interfaces\Entities\IMerchantEntity;
use App\Domain\Interfaces\Factories\IMerchantFactory;
use App\Models\Merchant;
use App\ValueObjects\EmailValueObject;
use App\ValueObjects\ImageValueObject;
use App\ValueObjects\BooleanValueObject;
use App\ValueObjects\LocationValueObject;
use App\ValueObjects\MerchantTypeValueObject;
use App\ValueObjects\UrlValueObject;

class MerchantModelFactory implements IMerchantFactory
{
    public function make(array $attributes = []): IMerchantEntity
    {
        if (isset($attributes['image'])) {
            $attributes['image'] = new ImageValueObject($attributes['image'], Merchant::IMAGE_DIR);
        }

        if (isset($attributes['logo'])) {
            $attributes['logo'] = new ImageValueObject($attributes['logo'], Merchant::IMAGE_DIR);
        }

        if (isset($attributes['location']['latitude']) && isset($attributes['location']['longitude'])) {
            $attributes['location'] = new LocationValueObject($attributes['location']);
        }

        if (isset($attributes['is_active'])) {
            $attributes['is_active'] = new BooleanValueObject($attributes['is_active']);
        }

        if (isset($attributes['type'])) {
            $attributes['type'] = new MerchantTypeValueObject($attributes['type']);
        }

        if (isset($attributes['video_url'])) {
            $attributes['video_url'] = new UrlValueObject($attributes['video_url']);
        }

        if (isset($attributes['email']) && is_string($attributes['email'])) {
            $attributes['email'] = new EmailValueObject($attributes['email']);
        }


        return new Merchant($attributes);
    }
}
