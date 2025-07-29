<?php

namespace App\Domain\UseCases\Permission\DeletePermission;

use App\Domain\Interfaces\IViewModel;

interface IDeletePermissionOutputPort
{
    public function permissionDeleted(DeletePermissionResponseModel $model): IViewModel;

    public function unableToDeletePermission(\Throwable $e): IViewModel;

    public function unableToFindPermission(): IViewModel;
}
