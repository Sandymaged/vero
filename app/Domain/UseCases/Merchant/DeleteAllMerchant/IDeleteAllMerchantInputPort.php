<?php

namespace App\Domain\UseCases\Merchant\DeleteAllMerchant;

use App\Domain\Interfaces\IViewModel;

interface IDeleteAllMerchantInputPort
{
    public function deleteAllMerchant(DeleteAllMerchantRequestModel $model): IViewModel;
}
