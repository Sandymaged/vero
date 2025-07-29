<?php

namespace App\Domain\UseCases\Merchant\DeleteMerchant;

use App\Domain\Interfaces\IViewModel;

interface IDeleteMerchantOutputPort
{
    public function merchantDeleted(DeleteMerchantResponseModel $model): IViewModel;

    public function unableToDeleteMerchant(\Throwable $e): IViewModel;

    public function unableToFindMerchant(): IViewModel;
}
