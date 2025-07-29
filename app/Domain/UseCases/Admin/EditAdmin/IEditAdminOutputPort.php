<?php

namespace App\Domain\UseCases\Admin\EditAdmin;

use App\Domain\Interfaces\IViewModel;

interface IEditAdminOutputPort
{
    public function editAdmin(EditAdminResponseModel $model): IViewModel;

    public function unableToFindAdmin(): IViewModel;
}
