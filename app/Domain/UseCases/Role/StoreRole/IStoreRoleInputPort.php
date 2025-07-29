<?php

namespace App\Domain\UseCases\Role\StoreRole;

use App\Domain\Interfaces\IViewModel;

interface IStoreRoleInputPort
{
    public function createRole(StoreRoleRequestModel $model): IViewModel;
}
