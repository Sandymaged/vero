<?php

namespace App\Domain\UseCases\MerchantBranch\UpdateMerchantBranch;

use App\Domain\Interfaces\Entities\IMerchantBranchEntity;

class UpdateMerchantBranchResponseModel
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
