<?php

namespace App\Domain\UseCases\Admin\CreateAdmin;

use App\Domain\Interfaces\IViewModel;

interface ICreateAdminOutputPort
{
    public function createAdmin(CreateAdminResponseModel $model): IViewModel;
}
