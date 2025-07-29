<?php

namespace App\Factories;

use App\Domain\Interfaces\Entities\IOfferEntity;
use App\Domain\Interfaces\Factories\IOfferFactory;
use App\Models\Offer;
use App\ValueObjects\BooleanValueObject;
use App\ValueObjects\ImageValueObject;
use App\ValueObjects\OfferTypeValueObject;
use App\ValueObjects\UrlValueObject;

class OfferModelFactory implements IOfferFactory
{
    public function make(array $attributes = []): IOfferEntity
    {
        if (isset($attributes['image'])) {
            $attributes['image'] = new ImageValueObject($attributes['image'], Offer::IMAGE_DIR);
        }

        if (isset($attributes['is_active'])) {
            $attributes['is_active'] = new BooleanValueObject($attributes['is_active']);
        }

        if (isset($attributes['type'])) {
            $attributes['type'] = new OfferTypeValueObject($attributes['type']);
        }

        if (isset($attributes['video_url'])) {
            $attributes['video_url'] = new UrlValueObject($attributes['video_url']);
        }

        return new Offer($attributes);
    }
}
