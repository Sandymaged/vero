<?php

namespace App\Domain\UseCases\Role\EditRole;

use App\Domain\Interfaces\IViewModel;

interface IEditRoleOutputPort
{
    public function editRole(EditRoleResponseModel $model): IViewModel;

    public function unableToFindRole(): IViewModel;
}
