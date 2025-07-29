<?php

namespace App\Domain\UseCases\MerchantUser\DeleteMerchantUser;

use App\Domain\Interfaces\IViewModel;

interface IDeleteMerchantUserOutputPort
{
    public function merchantUserDeleted(DeleteMerchantUserResponseModel $model): IViewModel;

    public function unableToDeleteMerchantUser(\Throwable $e): IViewModel;

    public function unableToFindMerchantUser(): IViewModel;
}
