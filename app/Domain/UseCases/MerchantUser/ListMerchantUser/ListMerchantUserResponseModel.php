<?php

namespace App\Domain\UseCases\MerchantUser\ListMerchantUser;

use Illuminate\Database\Eloquent\Collection;

class ListMerchantUserResponseModel
{
    private $merchantUsers;

    public function __construct(
        Collection $merchantUsers
    )
    {
        $this->merchantUsers = $merchantUsers;
    }

    public function getMerchantUsers(): Collection
    {
        return $this->merchantUsers;
    }
}
