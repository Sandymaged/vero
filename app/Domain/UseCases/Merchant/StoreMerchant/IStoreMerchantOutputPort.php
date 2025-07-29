<?php

namespace App\Domain\UseCases\Merchant\StoreMerchant;

use App\Domain\Interfaces\IViewModel;

interface IStoreMerchantOutputPort
{
    public function merchantCreated(StoreMerchantResponseModel $model): IViewModel;

    public function unableToStoreMerchant(StoreMerchantResponseModel $model, \Throwable $e): IViewModel;
}
