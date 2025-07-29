<?php

namespace App\Domain\UseCases\Permission\EditPermission;

use App\Domain\Interfaces\IViewModel;

interface IEditPermissionInputPort
{
    public function editPermission(int $id, EditPermissionRequestModel $model): IViewModel;

    public function unableToFindPermission(): IViewModel;
}
