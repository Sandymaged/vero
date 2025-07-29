<?php

namespace App\Adapters\Presenters\Permission;

use App\Adapters\Presenters\HttpPresenter;
use App\Adapters\ViewModels\HttpResponseIViewModel;
use App\Domain\Interfaces\IViewModel;
use App\Domain\UseCases\Permission\CreatePermission\CreatePermissionResponseModel;
use App\Domain\UseCases\Permission\CreatePermission\ICreatePermissionOutputPort;

class CreatePermissionHttpPresenter extends HttpPresenter implements ICreatePermissionOutputPort
{
    public function createPermission(CreatePermissionResponseModel $model): IViewModel
    {
        return new HttpResponseIViewModel(
            app('view')
                ->make('backend_views.permissions.create')
        );
    }
}
