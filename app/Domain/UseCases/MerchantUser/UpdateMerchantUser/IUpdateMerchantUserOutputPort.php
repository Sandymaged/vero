<?php

namespace App\Domain\UseCases\MerchantUser\UpdateMerchantUser;

use App\Domain\Interfaces\IViewModel;

interface IUpdateMerchantUserOutputPort
{
    public function merchantUserUpdated(UpdateMerchantUserResponseModel $model): IViewModel;

    public function unableToUpdateMerchantUser(UpdateMerchantUserResponseModel $model, \Throwable $e): IViewModel;

    public function unableToFindMerchantUser(): IViewModel;
}
