<?php

namespace App\Domain\UseCases\Merchant\ListMerchant;

class ListMerchantRequestModel
{
    public $page = 1;

    public function __construct(?int $page = 1)
    {
        $this->page = $page;
    }

}
