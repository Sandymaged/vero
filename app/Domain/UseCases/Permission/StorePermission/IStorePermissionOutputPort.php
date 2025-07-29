<?php

namespace App\Domain\UseCases\Permission\StorePermission;

use App\Domain\Interfaces\IViewModel;

interface IStorePermissionOutputPort
{
    public function permissionCreated(StorePermissionResponseModel $model): IViewModel;

    public function unableToStorePermission(StorePermissionResponseModel $model, \Throwable $e): IViewModel;
}
