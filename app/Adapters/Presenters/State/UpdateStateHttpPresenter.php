<?php

namespace App\Adapters\Presenters\State;

use App\Adapters\Presenters\HttpPresenter;
use App\Adapters\ViewModels\HttpResponseIViewModel;
use App\Domain\Interfaces\IViewModel;
use App\Domain\UseCases\State\UpdateState\IUpdateStateOutputPort;
use App\Domain\UseCases\State\UpdateState\UpdateStateResponseModel;
use Laracasts\Flash\Flash;

class UpdateStateHttpPresenter extends HttpPresenter implements IUpdateStateOutputPort
{
    public function stateUpdated(UpdateStateResponseModel $model): IViewModel
    {
        Flash::success(__('messages.updated_successfully', ['operator' => __('messages.attributes.state')]));
        return new HttpResponseIViewModel(
            app('redirect')->route(request()->get('guard').'.states.index')
        );
    }


    public function unableToUpdateState(UpdateStateResponseModel $model, \Throwable $e): IViewModel
    {
        if (config('app.debug')) {
            // rethrow and let Laravel display the error
            throw $e;
        }

        Flash::error(trans("messages.error_updating", ['operator' => trans("messages.attributes.State") . " {$model->getState()->getName()}"]));

        return new HttpResponseIViewModel(
            app('redirect')
                ->route(request()->get('guard').'.states.index')
        );
    }

    public function unableToFindState(): IViewModel
    {
        Flash::error(trans("messages.not_found", ['operator' => trans("messages.attributes.state")]));

        return new HttpResponseIViewModel(
            app('redirect')
                ->route(request()->get('guard') . '.states.index')
        );
    }
}
