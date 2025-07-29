<?php

namespace App\Domain\UseCases\Merchant\EditMerchant;

use App\Domain\Interfaces\IViewModel;

interface IEditMerchantOutputPort
{
    public function editMerchant(EditMerchantResponseModel $model): IViewModel;

    public function unableToFindMerchant(): IViewModel;
}
