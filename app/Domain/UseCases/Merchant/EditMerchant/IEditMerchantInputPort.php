<?php

namespace App\Domain\UseCases\Merchant\EditMerchant;

use App\Domain\Interfaces\IViewModel;

interface IEditMerchantInputPort
{
    public function editMerchant(int $id, EditMerchantRequestModel $model): IViewModel;
}
