<?php

namespace App\Domain\UseCases\Permission\EditPermission;

use App\Domain\Interfaces\IViewModel;

interface IEditPermissionOutputPort
{
    public function editPermission(EditPermissionResponseModel $model): IViewModel;

    public function unableToFindPermission(): IViewModel;
}
