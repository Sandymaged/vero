<?php

namespace App\Adapters\Presenters\City;

use App\Adapters\Presenters\HttpPresenter;
use App\Adapters\ViewModels\HttpResponseIViewModel;
use App\Domain\Interfaces\IViewModel;
use App\Domain\UseCases\City\UpdateCity\IUpdateCityOutputPort;
use App\Domain\UseCases\City\UpdateCity\UpdateCityResponseModel;
use Laracasts\Flash\Flash;

class UpdateCityHttpPresenter extends HttpPresenter implements IUpdateCityOutputPort
{
    public function cityUpdated(UpdateCityResponseModel $model): IViewModel
    {
        Flash::success(__('messages.updated_successfully', ['operator' => __('messages.attributes.city')]));
        return new HttpResponseIViewModel(
            app('redirect')->route(request()->get('guard').'.cities.index')
        );
    }


    public function unableToUpdateCity(UpdateCityResponseModel $model, \Throwable $e): IViewModel
    {
        if (config('app.debug')) {
            // rethrow and let Laravel display the error
            throw $e;
        }

        Flash::error(trans("messages.error_updating", ['operator' => trans("messages.attributes.City") . " {$model->getCity()->getName()}"]));

        return new HttpResponseIViewModel(
            app('redirect')
                ->route(request()->get('guard').'.cities.index')
        );
    }

    public function unableToFindCity(): IViewModel
    {

        Flash::error(trans("messages.not_found", ['operator' => trans("messages.attributes.city")]));

        return new HttpResponseIViewModel(
            app('redirect')
                ->route(request()->get('guard') . '.cities.index')
        );
    }
}
