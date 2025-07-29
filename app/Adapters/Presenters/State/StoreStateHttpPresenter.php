<?php

namespace App\Adapters\Presenters\State;

use App\Adapters\Presenters\HttpPresenter;
use App\Adapters\ViewModels\HttpResponseIViewModel;
use App\Domain\Interfaces\IViewModel;
use App\Domain\UseCases\State\StoreState\IStoreStateOutputPort;
use App\Domain\UseCases\State\StoreState\StoreStateResponseModel;
use Laracasts\Flash\Flash;

class StoreStateHttpPresenter extends HttpPresenter implements IStoreStateOutputPort
{
    public function stateCreated(StoreStateResponseModel $model): IViewModel
    {
        Flash::success(__('messages.created_successfully', ['operator' => __('messages.attributes.state')]));
        return new HttpResponseIViewModel(
            app('redirect')->route(request()->get('guard') . '.states.index')
        );
    }


    public function unableToStoreState(StoreStateResponseModel $model, \Throwable $e): IViewModel
    {
        if (config('app.debug')) {
            // rethrow and let Laravel display the error
            throw $e;
        }

        Flash::error(trans("messages.error_creating", ['operator' => trans("messages.attributes.state" . " {$model->getState()->getName()}")]));

        return new HttpResponseIViewModel(
            app('redirect')
                ->route(request()->get('guard') . '.states.index')
                ->withErrors(['create-state' => "Error occurred while creating state {$model->getState()->getName()}"])
        );
    }
}
