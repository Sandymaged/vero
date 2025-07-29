<?php

namespace App\Domain\UseCases\MerchantUser\DeleteMerchantUser;

use App\Domain\Interfaces\Entities\IMerchantUserEntity;

class DeleteMerchantUserResponseModel
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
