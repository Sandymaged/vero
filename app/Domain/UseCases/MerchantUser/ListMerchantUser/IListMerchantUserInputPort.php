<?php

namespace App\Domain\UseCases\MerchantUser\ListMerchantUser;

use App\Domain\Interfaces\IViewModel;

interface IListMerchantUserInputPort
{
    public function listMerchantUser(ListMerchantUserRequestModel $model): IViewModel;
}
