<?php

namespace App\Domain\Interfaces\Factories;

use App\Domain\Interfaces\Entities\IMerchantEntity;

interface IMerchantFactory
{
    /**
     * @param array<mixed> $attributes
     */
    public function make(array $attributes = []): IMerchantEntity;
}
