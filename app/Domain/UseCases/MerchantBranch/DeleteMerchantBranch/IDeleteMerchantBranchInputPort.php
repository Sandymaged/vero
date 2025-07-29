<?php

namespace App\Domain\UseCases\MerchantBranch\DeleteMerchantBranch;

use App\Domain\Interfaces\IViewModel;

interface IDeleteMerchantBranchInputPort
{
    public function deleteMerchantBranch(int $id, DeleteMerchantBranchRequestModel $model): IViewModel;
}
