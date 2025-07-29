<?php

namespace App\Domain\UseCases\Merchant\UpdateMerchant;

use App\Domain\Interfaces\Entities\IMerchantEntity;

class UpdateMerchantResponseModel
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
