<?php

namespace App\Domain\UseCases\Role\ListRole;

use App\Domain\Interfaces\IViewModel;

interface IListRoleOutputPort
{
    public function roleListed(ListRoleResponseModel $model): IViewModel;
}
