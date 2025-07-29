<?php

namespace App\Domain\UseCases\Role\DeleteRole;

use App\Domain\Interfaces\IViewModel;

interface IDeleteRoleInputPort
{
    public function deleteRole(int $id, DeleteRoleRequestModel $model): IViewModel;
}
