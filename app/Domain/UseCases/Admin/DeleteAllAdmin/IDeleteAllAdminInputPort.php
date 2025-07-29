<?php

namespace App\Domain\UseCases\Admin\DeleteAllAdmin;

use App\Domain\Interfaces\IViewModel;

interface IDeleteAllAdminInputPort
{
    public function deleteAllAdmin(DeleteAllAdminRequestModel $model): IViewModel;
}
