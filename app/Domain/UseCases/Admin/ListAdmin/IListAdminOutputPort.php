<?php

namespace App\Domain\UseCases\Admin\ListAdmin;

use App\Domain\Interfaces\IViewModel;

interface IListAdminOutputPort
{
    public function adminListed(ListAdminResponseModel $model): IViewModel;
}
