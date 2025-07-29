<?php

namespace App\Domain\UseCases\MerchantUser\UpdateMerchantUser;

use App\Domain\Interfaces\Entities\IMerchantUserEntity;

class UpdateMerchantUserResponseModel
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
