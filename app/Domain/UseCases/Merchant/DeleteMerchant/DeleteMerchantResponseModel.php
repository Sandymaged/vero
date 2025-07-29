<?php

namespace App\Domain\UseCases\Merchant\DeleteMerchant;

use App\Domain\Interfaces\Entities\IMerchantEntity;

class DeleteMerchantResponseModel
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
