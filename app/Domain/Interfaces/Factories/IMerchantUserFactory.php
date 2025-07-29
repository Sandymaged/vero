<?php

namespace App\Domain\Interfaces\Factories;

use App\Domain\Interfaces\Entities\IMerchantUserEntity;

interface IMerchantUserFactory
{
    /**
     * @param array<mixed> $attributes
     */
    public function make(array $attributes = []): IMerchantUserEntity;
}
