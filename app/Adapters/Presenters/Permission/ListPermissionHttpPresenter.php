<?php

namespace App\Adapters\Presenters\Permission;

use App\Adapters\Presenters\HttpPresenter;
use App\Adapters\ViewModels\HttpResponseIViewModel;
use App\Domain\Interfaces\IViewModel;
use App\Domain\UseCases\Permission\ListPermission\IListPermissionOutputPort;
use App\Domain\UseCases\Permission\ListPermission\ListPermissionResponseModel;

class ListPermissionHttpPresenter extends HttpPresenter implements IListPermissionOutputPort
{
    public function permissionListed(ListPermissionResponseModel $model): IViewModel
    {
        return new HttpResponseIViewModel(
            app('view')
                ->make('backend_views.permissions.index')
                ->with([
                    'permissions' => $model->getPermissions()
                ])
        );
    }
}
