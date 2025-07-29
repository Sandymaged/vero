<?php

namespace App\Domain\UseCases\Admin\EditAdmin;

use App\Domain\Interfaces\IViewModel;

interface IEditAdminInputPort
{
    public function editAdmin(int $id, EditAdminRequestModel $model): IViewModel;
}
