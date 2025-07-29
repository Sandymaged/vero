<?php

namespace App\Domain\UseCases\Role\DeleteAllRole;

use App\Domain\Interfaces\IViewModel;

interface IDeleteAllRoleInputPort
{
    public function deleteAllRole(DeleteAllRoleRequestModel $model): IViewModel;
}
