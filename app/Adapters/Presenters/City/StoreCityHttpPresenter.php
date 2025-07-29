<?php

namespace App\Adapters\Presenters\City;

use App\Adapters\Presenters\HttpPresenter;
use App\Adapters\ViewModels\HttpResponseIViewModel;
use App\Domain\Interfaces\IViewModel;
use App\Domain\UseCases\City\StoreCity\IStoreCityOutputPort;
use App\Domain\UseCases\City\StoreCity\StoreCityResponseModel;
use Laracasts\Flash\Flash;

class StoreCityHttpPresenter extends HttpPresenter implements IStoreCityOutputPort
{
    public function cityCreated(StoreCityResponseModel $model): IViewModel
    {
        Flash::success(__('messages.created_successfully', ['operator' => __('messages.attributes.city')]));
        return new HttpResponseIViewModel(
            app('redirect')->route(request()->get('guard').'.cities.index')
        );
    }


    public function unableToStoreCity(StoreCityResponseModel $model, \Throwable $e): IViewModel
    {
        if (config('app.debug')) {
            // rethrow and let Laravel display the error
            throw $e;
        }

        Flash::error(trans("messages.error_creating", ['operator' => trans("messages.attributes.city" . " {$model->getCity()->getName()}")]));

        return new HttpResponseIViewModel(
            app('redirect')
                ->route(request()->get('guard').'.cities.index')
        );
    }
}
