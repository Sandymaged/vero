<?php

namespace App\Domain\UseCases\Role\EditRole;

use App\Domain\Interfaces\IViewModel;

interface IEditRoleInputPort
{
    public function editRole(int $id, EditRoleRequestModel $model): IViewModel;
}
