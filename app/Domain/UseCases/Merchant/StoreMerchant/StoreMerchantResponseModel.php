<?php

namespace App\Domain\UseCases\Merchant\StoreMerchant;

use App\Domain\Interfaces\Entities\IMerchantEntity;

class StoreMerchantResponseModel
{
    private $merchant;

    public function __construct(
        IMerchantEntity $merchant
    )
    {
        $this->merchant = $merchant;
    }

    public function getMerchant(): IMerchantEntity
    {
        return $this->merchant;
    }
}
