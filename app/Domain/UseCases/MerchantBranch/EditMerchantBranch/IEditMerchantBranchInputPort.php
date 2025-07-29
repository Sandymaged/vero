<?php

namespace App\Domain\UseCases\MerchantBranch\EditMerchantBranch;

use App\Domain\Interfaces\IViewModel;

interface IEditMerchantBranchInputPort
{
    public function editMerchantBranch(int $id, EditMerchantBranchRequestModel $model): IViewModel;
}
