<?php

namespace App\Domain\UseCases\MerchantBranch\ListMerchantBranch;

class ListMerchantBranchRequestModel
{
    public $page = 1;

    public function __construct(?int $page = 1)
    {
        $this->page = $page;
    }

}
