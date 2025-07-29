<?php

namespace App\Domain\UseCases\Admin\CreateAdmin;

use App\Domain\Interfaces\IViewModel;

interface ICreateAdminInputPort
{
    public function createAdmin(CreateAdminRequestModel $model): IViewModel;
}
