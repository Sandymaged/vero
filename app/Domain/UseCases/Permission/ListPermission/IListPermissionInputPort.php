<?php

namespace App\Domain\UseCases\Permission\ListPermission;

use App\Domain\Interfaces\IViewModel;

interface IListPermissionInputPort
{
    public function listPermission(ListPermissionRequestModel $model): IViewModel;
}
