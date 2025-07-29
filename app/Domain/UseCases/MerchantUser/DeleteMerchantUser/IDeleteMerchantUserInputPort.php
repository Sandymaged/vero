<?php

namespace App\Domain\UseCases\MerchantUser\DeleteMerchantUser;

use App\Domain\Interfaces\IViewModel;

interface IDeleteMerchantUserInputPort
{
    public function deleteMerchantUser(int $id, DeleteMerchantUserRequestModel $model): IViewModel;
}
