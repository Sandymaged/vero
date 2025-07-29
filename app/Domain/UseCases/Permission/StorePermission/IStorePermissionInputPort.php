<?php

namespace App\Domain\UseCases\Permission\StorePermission;

use App\Domain\Interfaces\IViewModel;

interface IStorePermissionInputPort
{
    public function createPermission(StorePermissionRequestModel $model): IViewModel;
}
