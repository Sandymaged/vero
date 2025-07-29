<?php

namespace App\Domain\UseCases\Permission\DeleteAllPermission;

use App\Domain\Interfaces\IViewModel;

interface IDeleteAllPermissionOutputPort
{
    public function permissionsDeleted(): IViewModel;

    public function unableToDeleteAllPermission(\Throwable $e): IViewModel;
}
