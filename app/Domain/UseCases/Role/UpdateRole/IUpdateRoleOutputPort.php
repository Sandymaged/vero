<?php

namespace App\Domain\UseCases\Role\UpdateRole;

use App\Domain\Interfaces\IViewModel;

interface IUpdateRoleOutputPort
{
    public function roleUpdated(UpdateRoleResponseModel $model): IViewModel;

    public function unableToUpdateRole(UpdateRoleResponseModel $model, \Throwable $e): IViewModel;

    public function unableToFindRole(): IViewModel;
}
