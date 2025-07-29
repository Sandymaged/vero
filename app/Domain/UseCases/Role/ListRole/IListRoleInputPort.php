<?php

namespace App\Domain\UseCases\Role\ListRole;

use App\Domain\Interfaces\IViewModel;

interface IListRoleInputPort
{
    public function listRole(ListRoleRequestModel $model): IViewModel;
}
