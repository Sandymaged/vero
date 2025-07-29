<?php

namespace App\Domain\UseCases\Merchant\CreateMerchant;

use App\Domain\Interfaces\IViewModel;

interface ICreateMerchantOutputPort
{
    public function createMerchant(CreateMerchantResponseModel $model): IViewModel;
}
