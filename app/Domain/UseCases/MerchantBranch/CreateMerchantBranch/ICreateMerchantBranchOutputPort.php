<?php

namespace App\Domain\UseCases\MerchantBranch\CreateMerchantBranch;

use App\Domain\Interfaces\IViewModel;

interface ICreateMerchantBranchOutputPort
{
    public function createMerchantBranch(CreateMerchantBranchResponseModel $model): IViewModel;
}
