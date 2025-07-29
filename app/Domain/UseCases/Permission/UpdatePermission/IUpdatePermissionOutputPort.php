<?php

namespace App\Domain\UseCases\Permission\UpdatePermission;

use App\Domain\Interfaces\IViewModel;

interface IUpdatePermissionOutputPort
{
    public function permissionUpdated(UpdatePermissionResponseModel $model): IViewModel;

    public function unableToUpdatePermission(UpdatePermissionResponseModel $model, \Throwable $e): IViewModel;

    public function unableToFindPermission(): IViewModel;
}
