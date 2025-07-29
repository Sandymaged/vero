<?php

namespace App\Domain\UseCases\Permission\DeletePermission;

use App\Domain\Interfaces\IViewModel;

interface IDeletePermissionInputPort
{
    public function deletePermission(int $id, DeletePermissionRequestModel $model): IViewModel;
}
