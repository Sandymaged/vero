<?php

namespace App\Adapters\Presenters\Permission;

use App\Adapters\Presenters\HttpPresenter;
use App\Adapters\ViewModels\HttpResponseIViewModel;
use App\Domain\Interfaces\IViewModel;
use App\Domain\UseCases\Permission\StorePermission\IStorePermissionOutputPort;
use App\Domain\UseCases\Permission\StorePermission\StorePermissionResponseModel;
use Laracasts\Flash\Flash;

class StorePermissionHttpPresenter extends HttpPresenter implements IStorePermissionOutputPort
{
    public function permissionCreated(StorePermissionResponseModel $model): IViewModel
    {
        Flash::success(__('messages.created_successfully', ['operator' => __('messages.attributes.permission')]));
        return new HttpResponseIViewModel(
            app('redirect')->route(request()->get('guard').'.permissions.index')
        );
    }


    public function unableToStorePermission(StorePermissionResponseModel $model, \Throwable $e): IViewModel
    {
        if (config('app.debug')) {
            // rethrow and let Laravel display the error
            throw $e;
        }

        Flash::error(trans("messages.error_creating", ['operator' => trans("messages.attributes.permission" . " {$model->getPermission()->getName()}")]));

        return new HttpResponseIViewModel(
            app('redirect')
                ->route(request()->get('guard').'.permissions.index')
        );
    }
}
