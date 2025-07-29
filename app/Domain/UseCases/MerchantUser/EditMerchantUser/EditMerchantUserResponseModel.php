<?php

namespace App\Domain\UseCases\MerchantUser\EditMerchantUser;

use App\Domain\Interfaces\Entities\IMerchantUserEntity;

class EditMerchantUserResponseModel
{
    private $merchants;
    private $merchantBranches;
    private $merchantUser;

    public function __construct(
        IMerchantUserEntity $merchantUser,
        array $merchants,
        array $merchantBranches
    )
    {
        $this->merchantUser = $merchantUser;
        $this->merchants = $merchants;
        $this->merchantBranches = $merchantBranches;
    }

    public function getMerchantUser(): IMerchantUserEntity
    {
        return $this->merchantUser;
    }

    public function getMerchantBranches(): array
    {
        return $this->merchantBranches;
    }

    public function getMerchants(): array
    {
        return $this->merchants;
    }
}
