<?php

namespace App\Domain\UseCases\MerchantBranch\UpdateMerchantBranch;

use App\Domain\Interfaces\IViewModel;

interface IUpdateMerchantBranchOutputPort
{
    public function merchantBranchUpdated(UpdateMerchantBranchResponseModel $model): IViewModel;

    public function unableToUpdateMerchantBranch(UpdateMerchantBranchResponseModel $model, \Throwable $e): IViewModel;

    public function unableToFindMerchantBranch(): IViewModel;
}
