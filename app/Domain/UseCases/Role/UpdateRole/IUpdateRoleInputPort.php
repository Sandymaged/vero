<?php

namespace App\Domain\UseCases\Role\UpdateRole;

use App\Domain\Interfaces\IViewModel;

interface IUpdateRoleInputPort
{
    public function updateRole(int $id, UpdateRoleRequestModel $model): IViewModel;
}
