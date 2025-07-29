<?php

namespace App\Domain\UseCases\MerchantBranch\EditMerchantBranch;

use App\Domain\Interfaces\IViewModel;

interface IEditMerchantBranchOutputPort
{
    public function editMerchantBranch(EditMerchantBranchResponseModel $model): IViewModel;

    public function unableToFindMerchantBranch(): IViewModel;
}
