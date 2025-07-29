<?php

namespace App\Domain\UseCases\MerchantUser\DeleteAllMerchantUser;

use App\Domain\Interfaces\IViewModel;

interface IDeleteAllMerchantUserInputPort
{
    public function deleteAllMerchantUser(DeleteAllMerchantUserRequestModel $model): IViewModel;
}
