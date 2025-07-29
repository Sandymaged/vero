<?php

namespace App\Domain\UseCases\MerchantUser\StoreMerchantUser;

use App\Domain\Interfaces\Entities\IMerchantUserEntity;

class StoreMerchantUserResponseModel
{
    private $merchantUser;
    public function __construct(
        IMerchantUserEntity $merchantUser
    )
    {
        $this->merchantUser = $merchantUser;
    }

    public function getMerchantUser(): IMerchantUserEntity
    {
        return $this->merchantUser;
    }
}
