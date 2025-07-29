<?php

namespace App\Domain\UseCases\Admin\StoreAdmin;

use App\Domain\Interfaces\IViewModel;

interface IStoreAdminOutputPort
{
    public function adminCreated(StoreAdminResponseModel $model): IViewModel;

    public function unableToStoreAdmin(StoreAdminResponseModel $model, \Throwable $e): IViewModel;
}
