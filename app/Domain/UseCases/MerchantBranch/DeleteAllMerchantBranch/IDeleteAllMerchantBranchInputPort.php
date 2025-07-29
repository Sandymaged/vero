<?php

namespace App\Domain\UseCases\MerchantBranch\DeleteAllMerchantBranch;

use App\Domain\Interfaces\IViewModel;

interface IDeleteAllMerchantBranchInputPort
{
    public function deleteAllMerchantBranch(DeleteAllMerchantBranchRequestModel $model): IViewModel;
}
