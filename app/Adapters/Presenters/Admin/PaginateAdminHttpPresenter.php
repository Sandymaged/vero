<?php

namespace App\Adapters\Presenters\Admin;

use App\Adapters\Presenters\HttpPresenter;
use App\Adapters\ViewModels\HttpResponseIViewModel;
use App\Domain\Interfaces\IViewModel;
use App\Domain\UseCases\Admin\PaginateAdmin\IPaginateAdminOutputPort;
use App\Domain\UseCases\Admin\PaginateAdmin\PaginateAdminResponseModel;

class PaginateAdminHttpPresenter extends HttpPresenter implements IPaginateAdminOutputPort
{
    public function adminPaginateed(PaginateAdminResponseModel $model): IViewModel
    {
        return new HttpResponseIViewModel(
            $model->getAdmins()
        );
    }
}
