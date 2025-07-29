<?php

namespace App\Adapters\Presenters\Role;

use App\Adapters\Presenters\HttpPresenter;
use App\Adapters\ViewModels\HttpResponseIViewModel;
use App\Domain\Interfaces\IViewModel;
use App\Domain\UseCases\Role\DeleteRole\DeleteRoleResponseModel;
use App\Domain\UseCases\Role\EditRole\EditRoleResponseModel;
use App\Domain\UseCases\Role\EditRole\IEditRoleOutputPort;
use Laracasts\Flash\Flash;

class EditRoleHttpPresenter extends HttpPresenter implements IEditRoleOutputPort
{
    public function editRole(EditRoleResponseModel $model): IViewModel
    {
        return new HttpResponseIViewModel(
            app('view')
                ->make('backend_views.roles.edit')
                ->with([
                    'role' => $model->getRole(),
                    'permissions' => $model->getPermissions()
                ])
        );
    }

    public function unableToFindRole(): IViewModel
    {
        Flash::error(trans("messages.not_found", ['operator' => trans("messages.attributes.role")]));

        return new HttpResponseIViewModel(
            app('redirect')
                ->route(request()->get('guard').'.roles.index')
        );
    }
}
