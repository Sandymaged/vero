<?php

namespace App\Adapters\Presenters\Role;

use App\Adapters\Presenters\HttpPresenter;
use App\Adapters\ViewModels\HttpResponseIViewModel;
use App\Domain\Interfaces\IViewModel;
use App\Domain\UseCases\Role\StoreRole\IStoreRoleOutputPort;
use App\Domain\UseCases\Role\StoreRole\StoreRoleResponseModel;
use Laracasts\Flash\Flash;

class StoreRoleHttpPresenter extends HttpPresenter implements IStoreRoleOutputPort
{
    public function roleCreated(StoreRoleResponseModel $model): IViewModel
    {
        Flash::success(__('messages.created_successfully', ['operator' => __('messages.attributes.role')]));
        return new HttpResponseIViewModel(
            app('redirect')->route(request()->get('guard').'.roles.index')
        );
    }


    public function unableToStoreRole(StoreRoleResponseModel $model, \Throwable $e): IViewModel
    {
        if (config('app.debug')) {
            // rethrow and let Laravel display the error
            throw $e;
        }
        Flash::error(trans("messages.error_creating", ['operator' => trans("messages.attributes.role" . " {$model->getRole()->getName()}")]));

        return new HttpResponseIViewModel(
            app('redirect')
                ->route(request()->get('guard').'.roles.index')
        );
    }
}
