<?php

namespace App\Adapters\Presenters\Admin;

use App\Adapters\Presenters\HttpPresenter;
use App\Adapters\ViewModels\HttpResponseIViewModel;
use App\Domain\Interfaces\IViewModel;
use App\Domain\UseCases\Admin\StoreAdmin\IStoreAdminOutputPort;
use App\Domain\UseCases\Admin\StoreAdmin\StoreAdminResponseModel;
use Laracasts\Flash\Flash;

class StoreAdminHttpPresenter extends HttpPresenter implements IStoreAdminOutputPort
{
    public function adminCreated(StoreAdminResponseModel $model): IViewModel
    {
        Flash::success(__('messages.created_successfully', ['operator' => __('messages.attributes.admin')]));
        return new HttpResponseIViewModel(
            app('redirect')->route(request()->get('guard').'.admins.index')
        );
    }


    public function unableToStoreAdmin(StoreAdminResponseModel $model, \Throwable $e): IViewModel
    {
        if (config('app.debug')) {
            // rethrow and let Laravel display the error
            throw $e;
        }

        Flash::error(trans("messages.error_creating", ['operator' => trans("messages.attributes.admin" . " {$model->getAdmin()->getName()}")]));

        return new HttpResponseIViewModel(
            app('redirect')
                ->route(request()->get('guard').'.admins.index')
        );
    }
}
