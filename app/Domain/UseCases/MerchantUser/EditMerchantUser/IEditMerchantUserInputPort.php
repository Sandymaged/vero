<?php

namespace App\Domain\UseCases\MerchantUser\EditMerchantUser;

use App\Domain\Interfaces\IViewModel;

interface IEditMerchantUserInputPort
{
    public function editMerchantUser(int $id, EditMerchantUserRequestModel $model): IViewModel;
}
