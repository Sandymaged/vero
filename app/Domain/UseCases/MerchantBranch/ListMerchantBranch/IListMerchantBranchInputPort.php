<?php

namespace App\Domain\UseCases\MerchantBranch\ListMerchantBranch;

use App\Domain\Interfaces\IViewModel;

interface IListMerchantBranchInputPort
{
    public function listMerchantBranch(ListMerchantBranchRequestModel $model): IViewModel;
}
