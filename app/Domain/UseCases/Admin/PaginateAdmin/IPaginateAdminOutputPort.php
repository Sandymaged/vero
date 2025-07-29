<?php

namespace App\Domain\UseCases\Admin\PaginateAdmin;

use App\Domain\Interfaces\IViewModel;

interface IPaginateAdminOutputPort
{
    public function adminPaginateed(PaginateAdminResponseModel $model): IViewModel;
}
