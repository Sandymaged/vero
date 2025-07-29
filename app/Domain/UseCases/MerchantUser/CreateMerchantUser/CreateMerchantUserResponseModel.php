<?php

namespace App\Domain\UseCases\MerchantUser\CreateMerchantUser;

class CreateMerchantUserResponseModel
{
    private $merchants;
    private $merchantBranches;

    public function __construct(
        array $merchants,
        array $merchantBranches
    )
    {
        $this->merchants = $merchants;
        $this->merchantBranches = $merchantBranches;
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
