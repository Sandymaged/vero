<?php

namespace App\Domain\UseCases\Merchant\PaginateMerchant;

use App\Domain\Interfaces\IViewModel;

interface IPaginateMerchantOutputPort
{
    public function merchantPaginateed(PaginateMerchantResponseModel $model): IViewModel;
}
