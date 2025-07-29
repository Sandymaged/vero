<?php

namespace App\Domain\UseCases\MerchantBranch\DeleteAllMerchantBranch;

use App\Domain\Interfaces\IViewModel;

interface IDeleteAllMerchantBranchOutputPort
{
    public function merchantBranchesDeleted(): IViewModel;

    public function unableToDeleteAllMerchantBranch(\Throwable $e): IViewModel;
}
