<?php

namespace App\Domain\UseCases\MerchantUser\StoreMerchantUser;

use App\Domain\Interfaces\IViewModel;

interface IStoreMerchantUserInputPort
{
    public function createMerchantUser(StoreMerchantUserRequestModel $model): IViewModel;
}
