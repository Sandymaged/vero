<?php

namespace App\Domain\UseCases\MerchantBranch\DeleteMerchantBranch;

use App\Domain\Interfaces\Entities\IMerchantBranchEntity;

class DeleteMerchantBranchResponseModel
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
