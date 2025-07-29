<?php

namespace App\Domain\UseCases\Role\DeleteRole;

use App\Domain\Interfaces\IViewModel;

interface IDeleteRoleOutputPort
{
    public function roleDeleted(DeleteRoleResponseModel $model): IViewModel;

    public function unableToDeleteRole(\Throwable $e): IViewModel;

    public function unableToFindRole(): IViewModel;
}
