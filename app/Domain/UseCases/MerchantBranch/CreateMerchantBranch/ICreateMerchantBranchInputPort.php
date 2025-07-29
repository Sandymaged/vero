<?php

namespace App\Domain\UseCases\MerchantBranch\CreateMerchantBranch;

use App\Domain\Interfaces\IViewModel;

interface ICreateMerchantBranchInputPort
{
    public function createMerchantBranch(CreateMerchantBranchRequestModel $model): IViewModel;
}
