<?php

namespace App\Domain\Interfaces\Factories;

use App\Domain\Interfaces\Entities\IMerchantBranchEntity;

interface IMerchantBranchFactory
{
    /**
     * @param array<mixed> $attributes
     */
    public function make(array $attributes = []): IMerchantBranchEntity;
}
