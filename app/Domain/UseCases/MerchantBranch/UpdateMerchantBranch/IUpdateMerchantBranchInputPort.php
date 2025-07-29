<?php

namespace App\Domain\UseCases\MerchantBranch\UpdateMerchantBranch;

use App\Domain\Interfaces\IViewModel;

interface IUpdateMerchantBranchInputPort
{
    public function updateMerchantBranch(int $id, UpdateMerchantBranchRequestModel $model): IViewModel;
}
