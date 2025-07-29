<?php

namespace App\Domain\UseCases\StoreUser;

use App\Domain\Interfaces\IViewModel;

interface IStoreUserInputPort
{
    public function createUser(StoreUserRequestModel $model): IViewModel;
}
