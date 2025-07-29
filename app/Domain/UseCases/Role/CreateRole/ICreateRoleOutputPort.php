<?php

namespace App\Domain\UseCases\Role\CreateRole;

use App\Domain\Interfaces\IViewModel;

interface ICreateRoleOutputPort
{
    public function createRole(CreateRoleResponseModel $model): IViewModel;
}
