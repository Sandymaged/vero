<?php

namespace App\Domain\UseCases\MerchantBranch\StoreMerchantBranch;

use App\Domain\Interfaces\IViewModel;

interface IStoreMerchantBranchOutputPort
{
    public function merchantBranchCreated(StoreMerchantBranchResponseModel $model): IViewModel;

    public function unableToStoreMerchantBranch(StoreMerchantBranchResponseModel $model, \Throwable $e): IViewModel;
}
