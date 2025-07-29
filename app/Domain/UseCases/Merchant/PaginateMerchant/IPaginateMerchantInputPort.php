<?php

namespace App\Domain\UseCases\Merchant\PaginateMerchant;

use App\Domain\Interfaces\IViewModel;

interface IPaginateMerchantInputPort
{
    public function listMerchant(PaginateMerchantRequestModel $model): IViewModel;
}
