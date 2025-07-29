<?php

namespace App\Domain\UseCases\MerchantUser\CreateMerchantUser;

use App\Domain\Interfaces\IViewModel;

interface ICreateMerchantUserOutputPort
{
    public function createMerchantUser(CreateMerchantUserResponseModel $model): IViewModel;
}
