<?php

namespace App\Domain\UseCases\MerchantUser\CreateMerchantUser;

use App\Domain\Interfaces\IViewModel;

interface ICreateMerchantUserInputPort
{
    public function createMerchantUser(CreateMerchantUserRequestModel $model): IViewModel;
}
