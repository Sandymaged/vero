<?php

namespace App\Domain\UseCases\Admin\UpdateAdmin;

use App\Domain\Interfaces\IViewModel;

interface IUpdateAdminInputPort
{
    public function updateAdmin(int $id, UpdateAdminRequestModel $model): IViewModel;
}
