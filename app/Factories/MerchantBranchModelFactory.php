<?php

namespace App\Factories;

use App\Domain\Interfaces\Entities\IMerchantBranchEntity;
use App\Domain\Interfaces\Factories\IMerchantBranchFactory;
use App\Models\MerchantBranch;
use App\ValueObjects\ImageValueObject;
use App\ValueObjects\BooleanValueObject;
use App\ValueObjects\LocationValueObject;

class MerchantBranchModelFactory implements IMerchantBranchFactory
{
    public function make(array $attributes = []): IMerchantBranchEntity
    {
        if (isset($attributes['image'])) {
            $attributes['image'] = new ImageValueObject($attributes['image'], MerchantBranch::IMAGE_DIR);
        }

        if (isset($attributes['location']['latitude']) && isset($attributes['location']['longitude'])) {
            $attributes['location'] = new LocationValueObject($attributes['location']);
        }

        if (isset($attributes['is_active'])) {
            $attributes['is_active'] = new BooleanValueObject($attributes['is_active']);
        }

        return new MerchantBranch($attributes);
    }
}
