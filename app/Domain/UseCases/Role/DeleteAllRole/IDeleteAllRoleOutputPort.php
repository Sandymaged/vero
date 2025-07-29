<?php

namespace App\Domain\UseCases\Role\DeleteAllRole;

use App\Domain\Interfaces\IViewModel;

interface IDeleteAllRoleOutputPort
{
    public function rolesDeleted(): IViewModel;

    public function unableToDeleteAllRole(\Throwable $e): IViewModel;
}
