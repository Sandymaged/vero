<?php

namespace App\Domain\UseCases\Admin\PaginateAdmin;

use App\Domain\Interfaces\IViewModel;

interface IPaginateAdminInputPort
{
    public function listAdmin(PaginateAdminRequestModel $model): IViewModel;
}
