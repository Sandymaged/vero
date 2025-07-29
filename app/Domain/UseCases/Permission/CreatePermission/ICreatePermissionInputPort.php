<?php

namespace App\Domain\UseCases\Permission\CreatePermission;

use App\Domain\Interfaces\IViewModel;

interface ICreatePermissionInputPort
{
    public function createPermission(CreatePermissionRequestModel $model): IViewModel;
}
