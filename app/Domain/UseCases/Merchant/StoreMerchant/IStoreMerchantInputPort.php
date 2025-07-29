<?php

namespace App\Domain\UseCases\Merchant\StoreMerchant;

use App\Domain\Interfaces\IViewModel;

interface IStoreMerchantInputPort
{
    public function createMerchant(StoreMerchantRequestModel $model): IViewModel;
}
