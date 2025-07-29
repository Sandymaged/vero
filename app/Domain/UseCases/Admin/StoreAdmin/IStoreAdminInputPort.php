<?php

namespace App\Domain\UseCases\Admin\StoreAdmin;

use App\Domain\Interfaces\IViewModel;

interface IStoreAdminInputPort
{
    public function createAdmin(StoreAdminRequestModel $model): IViewModel;
}
