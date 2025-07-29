<?php

namespace App\Domain\UseCases\Admin\UpdateAdmin;

use App\Domain\Interfaces\IViewModel;

interface IUpdateAdminOutputPort
{
    public function adminUpdated(UpdateAdminResponseModel $model): IViewModel;

    public function unableToUpdateAdmin(UpdateAdminResponseModel $model, \Throwable $e): IViewModel;

    public function unableToFindAdmin(): IViewModel;
}
