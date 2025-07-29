<?php

namespace App\Domain\UseCases\MerchantUser\UpdateMerchantUser;

use App\Domain\Interfaces\IViewModel;

interface IUpdateMerchantUserInputPort
{
    public function updateMerchantUser(int $id, UpdateMerchantUserRequestModel $model): IViewModel;
}
