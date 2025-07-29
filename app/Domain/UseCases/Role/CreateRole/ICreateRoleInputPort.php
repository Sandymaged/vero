<?php

namespace App\Domain\UseCases\Role\CreateRole;

use App\Domain\Interfaces\IViewModel;

interface ICreateRoleInputPort
{
    public function createRole(CreateRoleRequestModel $model): IViewModel;
}
