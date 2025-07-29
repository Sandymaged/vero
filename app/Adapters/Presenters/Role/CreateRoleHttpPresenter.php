<?php

namespace App\Adapters\Presenters\Role;

use App\Adapters\Presenters\HttpPresenter;
use App\Adapters\ViewModels\HttpResponseIViewModel;
use App\Domain\Interfaces\IViewModel;
use App\Domain\UseCases\Role\CreateRole\CreateRoleResponseModel;
use App\Domain\UseCases\Role\CreateRole\ICreateRoleOutputPort;

class CreateRoleHttpPresenter extends HttpPresenter implements ICreateRoleOutputPort
{
    public function createRole(CreateRoleResponseModel $model): IViewModel
    {
        return new HttpResponseIViewModel(
            app('view')
                ->make('backend_views.roles.create')
                ->with([
                    'permissions' => $model->getPermissions()
                ])
        );
    }
}
