<?php

namespace App\Domain\UseCases\Merchant\DeleteAllMerchant;

use App\Domain\Interfaces\IViewModel;

interface IDeleteAllMerchantOutputPort
{
    public function merchantsDeleted(): IViewModel;

    public function unableToDeleteAllMerchant(\Throwable $e): IViewModel;
}
