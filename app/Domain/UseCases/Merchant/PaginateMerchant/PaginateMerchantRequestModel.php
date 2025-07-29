<?php

namespace App\Domain\UseCases\Merchant\PaginateMerchant;

class PaginateMerchantRequestModel
{
    public $page = 1;

    public function __construct(?int $page = 1)
    {
        $this->page = $page;
    }

}
