<?php

namespace App\Domain\UseCases\Role\StoreRole;

use App\Domain\Interfaces\IViewModel;

interface IStoreRoleOutputPort
{
    public function roleCreated(StoreRoleResponseModel $model): IViewModel;

    public function unableToStoreRole(StoreRoleResponseModel $model, \Throwable $e): IViewModel;
}
