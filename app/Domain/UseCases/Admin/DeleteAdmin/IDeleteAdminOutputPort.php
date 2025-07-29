<?php

namespace App\Domain\UseCases\Admin\DeleteAdmin;

use App\Domain\Interfaces\IViewModel;

interface IDeleteAdminOutputPort
{
    public function adminDeleted(DeleteAdminResponseModel $model): IViewModel;

    public function unableToDeleteAdmin(\Throwable $e): IViewModel;

    public function unableToFindAdmin(): IViewModel;
}
