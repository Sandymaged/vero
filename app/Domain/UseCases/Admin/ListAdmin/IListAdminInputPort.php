<?php

namespace App\Domain\UseCases\Admin\ListAdmin;

use App\Domain\Interfaces\IViewModel;

interface IListAdminInputPort
{
    public function listAdmin(ListAdminRequestModel $model): IViewModel;
}
