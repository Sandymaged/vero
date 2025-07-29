<?php

namespace App\Domain\UseCases\Merchant\CreateMerchant;

use App\Domain\Interfaces\IViewModel;

interface ICreateMerchantInputPort
{
    public function createMerchant(CreateMerchantRequestModel $model): IViewModel;
}
