<?php

namespace App\Domain\UseCases\Permission\DeleteAllPermission;

use App\Domain\Interfaces\IViewModel;

interface IDeleteAllPermissionInputPort
{
    public function deleteAllPermission(DeleteAllPermissionRequestModel $model): IViewModel;
}
