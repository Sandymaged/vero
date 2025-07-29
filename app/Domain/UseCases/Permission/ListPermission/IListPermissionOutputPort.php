<?php

namespace App\Domain\UseCases\Permission\ListPermission;

use App\Domain\Interfaces\IViewModel;

interface IListPermissionOutputPort
{
    public function permissionListed(ListPermissionResponseModel $model): IViewModel;
}
