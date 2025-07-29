<?php

namespace App\Domain\UseCases\MerchantBranch\ListMerchantBranch;

use Illuminate\Database\Eloquent\Collection;

class ListMerchantBranchResponseModel
{
    private $merchantBranches;

    public function __construct(
        Collection $merchantBranches
    )
    {
        $this->merchantBranches = $merchantBranches;
    }

    public function getMerchantBranches(): Collection
    {
        return $this->merchantBranches;
    }
}
