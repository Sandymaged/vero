<?php

namespace App\Domain\UseCases\MerchantBranch\StoreMerchantBranch;

use App\Domain\Interfaces\Entities\IMerchantBranchEntity;

class StoreMerchantBranchResponseModel
{
    private $merchantBranch;

    public function __construct(
        IMerchantBranchEntity $merchantBranch
    )
    {
        $this->merchantBranch = $merchantBranch;
    }

    public function getMerchantBranch(): IMerchantBranchEntity
    {
        return $this->merchantBranch;
    }
}
