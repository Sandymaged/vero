<?php

namespace App\Domain\UseCases\Merchant\DeleteMerchant;

use App\Domain\Interfaces\IViewModel;

interface IDeleteMerchantInputPort
{
    public function deleteMerchant(int $id, DeleteMerchantRequestModel $model): IViewModel;
}
