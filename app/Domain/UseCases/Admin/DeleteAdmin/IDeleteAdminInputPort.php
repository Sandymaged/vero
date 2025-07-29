<?php

namespace App\Domain\UseCases\Admin\DeleteAdmin;

use App\Domain\Interfaces\IViewModel;

interface IDeleteAdminInputPort
{
    public function deleteAdmin(int $id, DeleteAdminRequestModel $model): IViewModel;
}
