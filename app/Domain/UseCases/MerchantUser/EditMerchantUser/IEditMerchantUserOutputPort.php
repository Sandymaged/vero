<?php

namespace App\Domain\UseCases\MerchantUser\EditMerchantUser;

use App\Domain\Interfaces\IViewModel;

interface IEditMerchantUserOutputPort
{
    public function editMerchantUser(EditMerchantUserResponseModel $model): IViewModel;

    public function unableToFindMerchantUser(): IViewModel;
}
