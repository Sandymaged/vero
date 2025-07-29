<?php

namespace App\Adapters\Presenters\Role;

use App\Adapters\Presenters\HttpPresenter;
use App\Adapters\ViewModels\HttpResponseIViewModel;
use App\Domain\Interfaces\IViewModel;
use App\Domain\UseCases\Role\ListRole\IListRoleOutputPort;
use App\Domain\UseCases\Role\ListRole\ListRoleResponseModel;

class ListRoleHttpPresenter extends HttpPresenter implements IListRoleOutputPort
{
    public function roleListed(ListRoleResponseModel $model): IViewModel
    {
        return new HttpResponseIViewModel(
            app('view')
                ->make('backend_views.roles.index')
                ->with([
                    'roles' => $model->getRoles()
                ])
        );
    }
}
