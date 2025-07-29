<?php

namespace App\Domain\UseCases\Merchant\UpdateMerchant;

use App\Domain\Interfaces\IViewModel;

interface IUpdateMerchantInputPort
{
    public function updateMerchant(int $id, UpdateMerchantRequestModel $model): IViewModel;
}
