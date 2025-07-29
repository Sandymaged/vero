<?php

namespace App\Adapters\Presenters\Admin;

use App\Adapters\Presenters\HttpPresenter;
use App\Adapters\ViewModels\HttpResponseIViewModel;
use App\Domain\Interfaces\IViewModel;
use App\Domain\UseCases\Admin\UpdateAdmin\IUpdateAdminOutputPort;
use App\Domain\UseCases\Admin\UpdateAdmin\UpdateAdminResponseModel;
use Laracasts\Flash\Flash;

class UpdateAdminHttpPresenter extends HttpPresenter implements IUpdateAdminOutputPort
{
    public function adminUpdated(UpdateAdminResponseModel $model): IViewModel
    {
        Flash::success(__('messages.updated_successfully', ['operator' => __('messages.attributes.admin')]));
        return new HttpResponseIViewModel(
            app('redirect')->route(request()->get('guard') . '.admins.index')
        );
    }


    public function unableToUpdateAdmin(UpdateAdminResponseModel $model, \Throwable $e): IViewModel
    {
        if (config('app.debug')) {
            // rethrow and let Laravel display the error
            throw $e;
        }

        Flash::error(trans("messages.error_updating", ['operator' => trans("messages.attributes.Admin") . " {$model->getAdmin()->getName()}"]));

        return new HttpResponseIViewModel(
            app('redirect')
                ->route(request()->get('guard') . '.admins.index')
        );
    }

    public function unableToFindAdmin(): IViewModel
    {

        Flash::error(trans("messages.not_found", ['operator' => trans("messages.attributes.admin")]));

        return new HttpResponseIViewModel(
            app('redirect')
                ->route(request()->get('guard') . '.admins.index')
        );
    }
}
