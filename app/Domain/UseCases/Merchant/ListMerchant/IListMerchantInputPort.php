<?php

namespace App\Domain\UseCases\Merchant\ListMerchant;

use App\Domain\Interfaces\IViewModel;

interface IListMerchantInputPort
{
    public function listMerchant(ListMerchantRequestModel $model): IViewModel;
}
