<?php

namespace App\Domain\UseCases\MerchantUser\ListMerchantUser;

class ListMerchantUserRequestModel
{
    public $page = 1;

    public function __construct(?int $page = 1)
    {
        $this->page = $page;
    }

}
