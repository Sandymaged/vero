<?php

namespace App\Domain\UseCases\MerchantUser\ListMerchantUser;

use App\Domain\Interfaces\IViewModel;

interface IListMerchantUserOutputPort
{
    public function merchantUserListed(ListMerchantUserResponseModel $model): IViewModel;
}
