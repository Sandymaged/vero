<?php

namespace App\Domain\UseCases\Permission\UpdatePermission;

use App\Domain\Interfaces\IViewModel;

interface IUpdatePermissionInputPort
{
    public function updatePermission(int $id, UpdatePermissionRequestModel $model): IViewModel;
}
