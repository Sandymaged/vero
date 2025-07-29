<?php

namespace App\Adapters\Presenters\Permission;

use App\Adapters\Presenters\HttpPresenter;
use App\Adapters\ViewModels\HttpResponseIViewModel;
use App\Domain\Interfaces\IViewModel;
use App\Domain\UseCases\Permission\UpdatePermission\IUpdatePermissionOutputPort;
use App\Domain\UseCases\Permission\UpdatePermission\UpdatePermissionResponseModel;
use Laracasts\Flash\Flash;

class UpdatePermissionHttpPresenter extends HttpPresenter implements IUpdatePermissionOutputPort
{
    public function permissionUpdated(UpdatePermissionResponseModel $model): IViewModel
    {
        Flash::success(__('messages.updated_successfully', ['operator' => __('messages.attributes.permission')]));
        return new HttpResponseIViewModel(
            app('redirect')->route(request()->get('guard').'.permissions.index')
        );
    }


    public function unableToUpdatePermission(UpdatePermissionResponseModel $model, \Throwable $e): IViewModel
    {
        if (config('app.debug')) {
            // rethrow and let Laravel display the error
            throw $e;
        }

        Flash::error(trans("messages.error_updating", ['operator' => trans("messages.attributes.Permission") . " {$model->getPermission()->getName()}"]));

        return new HttpResponseIViewModel(
            app('redirect')
                ->route(request()->get('guard').'.permissions.index')
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
