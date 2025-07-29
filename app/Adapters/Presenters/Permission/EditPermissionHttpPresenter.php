<?php

namespace App\Adapters\Presenters\Permission;

use App\Adapters\Presenters\HttpPresenter;
use App\Adapters\ViewModels\HttpResponseIViewModel;
use App\Domain\Interfaces\IViewModel;
use App\Domain\UseCases\Permission\DeletePermission\DeletePermissionResponseModel;
use App\Domain\UseCases\Permission\EditPermission\EditPermissionResponseModel;
use App\Domain\UseCases\Permission\EditPermission\IEditPermissionOutputPort;
use Laracasts\Flash\Flash;

class EditPermissionHttpPresenter extends HttpPresenter implements IEditPermissionOutputPort
{
    public function editPermission(EditPermissionResponseModel $model): IViewModel
    {
        return new HttpResponseIViewModel(
            app('view')
                ->make('backend_views.permissions.edit')
                ->with([
                    'permission' => $model->getPermission()
                ])
        );
    }

    public function unableToFindPermission(): IViewModel
    {

        Flash::error(trans("messages.not_found", ['operator' => trans("messages.attributes.permission")]));

        return new HttpResponseIViewModel(
            app('redirect')
                ->route(request()->get('guard') . '.permissions.index')
        );
    }
}
