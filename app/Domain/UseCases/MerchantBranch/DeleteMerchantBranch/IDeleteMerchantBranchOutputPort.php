<?php

namespace App\Domain\UseCases\MerchantBranch\DeleteMerchantBranch;

use App\Domain\Interfaces\IViewModel;

interface IDeleteMerchantBranchOutputPort
{
    public function merchantBranchDeleted(DeleteMerchantBranchResponseModel $model): IViewModel;

    public function unableToDeleteMerchantBranch(\Throwable $e): IViewModel;

    public function unableToFindMerchantBranch(): IViewModel;
}
