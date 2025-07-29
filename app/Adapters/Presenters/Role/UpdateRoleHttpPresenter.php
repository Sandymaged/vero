<?php

namespace App\Adapters\Presenters\Role;

use App\Adapters\Presenters\HttpPresenter;
use App\Adapters\ViewModels\HttpResponseIViewModel;
use App\Domain\Interfaces\IViewModel;
use App\Domain\UseCases\Role\UpdateRole\IUpdateRoleOutputPort;
use App\Domain\UseCases\Role\UpdateRole\UpdateRoleResponseModel;
use Laracasts\Flash\Flash;

class UpdateRoleHttpPresenter extends HttpPresenter implements IUpdateRoleOutputPort
{
    public function roleUpdated(UpdateRoleResponseModel $model): IViewModel
    {
        Flash::success(__('messages.updated_successfully', ['operator' => __('messages.attributes.role')]));
        return new HttpResponseIViewModel(
            app('redirect')->route(request()->get('guard').'.roles.index')
        );
    }


    public function unableToUpdateRole(UpdateRoleResponseModel $model, \Throwable $e): IViewModel
    {
        if (config('app.debug')) {
            // rethrow and let Laravel display the error
            throw $e;
        }

        Flash::error(trans("messages.error_updating", ['operator' => trans("messages.attributes.Role") . " {$model->getRole()->getName()}"]));

        return new HttpResponseIViewModel(
            app('redirect')
                ->route(request()->get('guard').'.roles.index')
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
