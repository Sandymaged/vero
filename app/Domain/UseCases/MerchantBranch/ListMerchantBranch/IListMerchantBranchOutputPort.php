<?php

namespace App\Domain\UseCases\MerchantBranch\ListMerchantBranch;

use App\Domain\Interfaces\IViewModel;

interface IListMerchantBranchOutputPort
{
    public function merchantBranchListed(ListMerchantBranchResponseModel $model): IViewModel;
}
