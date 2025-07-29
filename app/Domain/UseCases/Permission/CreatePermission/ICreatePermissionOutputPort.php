<?php

namespace App\Domain\UseCases\Permission\CreatePermission;

use App\Domain\Interfaces\IViewModel;

interface ICreatePermissionOutputPort
{
    public function createPermission(CreatePermissionResponseModel $model): IViewModel;
}
