<?php

namespace App\Domain\UseCases\MerchantBranch\StoreMerchantBranch;

use App\Domain\Interfaces\IViewModel;

interface IStoreMerchantBranchInputPort
{
    public function createMerchantBranch(StoreMerchantBranchRequestModel $model): IViewModel;
}
