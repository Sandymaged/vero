<?php

namespace App\Adapters\Presenters\Admin;

use App\Adapters\Presenters\HttpPresenter;
use App\Adapters\ViewModels\HttpResponseIViewModel;
use App\Domain\Interfaces\IViewModel;
use App\Domain\UseCases\Admin\ListAdmin\IListAdminOutputPort;
use App\Domain\UseCases\Admin\ListAdmin\ListAdminResponseModel;

class ListAdminHttpPresenter extends HttpPresenter implements IListAdminOutputPort
{
    public function adminListed(ListAdminResponseModel $model): IViewModel
    {
        return new HttpResponseIViewModel(
            app('view')
                ->make('backend_views.admins.index')
                ->with([
                    'roles' => $model->getRoles(),
                ])
        );
    }
}
