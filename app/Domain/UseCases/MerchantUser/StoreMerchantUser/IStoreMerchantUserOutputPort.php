<?php

namespace App\Domain\UseCases\MerchantUser\StoreMerchantUser;

use App\Domain\Interfaces\IViewModel;

interface IStoreMerchantUserOutputPort
{
    public function merchantUserCreated(StoreMerchantUserResponseModel $model): IViewModel;

    public function unableToStoreMerchantUser(StoreMerchantUserResponseModel $model, \Throwable $e): IViewModel;
}
