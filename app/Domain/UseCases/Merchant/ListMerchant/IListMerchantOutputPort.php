<?php

namespace App\Domain\UseCases\Merchant\ListMerchant;

use App\Domain\Interfaces\IViewModel;

interface IListMerchantOutputPort
{
    public function merchantListed(ListMerchantResponseModel $model): IViewModel;
}
