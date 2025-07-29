<?php

namespace App\Domain\UseCases\MerchantUser\DeleteAllMerchantUser;

use App\Domain\Interfaces\IViewModel;

interface IDeleteAllMerchantUserOutputPort
{
    public function merchantUsersDeleted(): IViewModel;

    public function unableToDeleteAllMerchantUser(\Throwable $e): IViewModel;
}
