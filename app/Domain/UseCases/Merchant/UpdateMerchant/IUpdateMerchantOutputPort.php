<?php

namespace App\Domain\UseCases\Merchant\UpdateMerchant;

use App\Domain\Interfaces\IViewModel;

interface IUpdateMerchantOutputPort
{
    public function merchantUpdated(UpdateMerchantResponseModel $model): IViewModel;

    public function unableToUpdateMerchant(UpdateMerchantResponseModel $model, \Throwable $e): IViewModel;

    public function unableToFindMerchant(): IViewModel;
}
