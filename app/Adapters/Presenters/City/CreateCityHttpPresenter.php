<?php

namespace App\Adapters\Presenters\City;

use App\Adapters\Presenters\HttpPresenter;
use App\Adapters\ViewModels\HttpResponseIViewModel;
use App\Domain\Interfaces\IViewModel;
use App\Domain\UseCases\City\CreateCity\CreateCityResponseModel;
use App\Domain\UseCases\City\CreateCity\ICreateCityOutputPort;

class CreateCityHttpPresenter extends HttpPresenter implements ICreateCityOutputPort
{
    public function createCity(CreateCityResponseModel $model): IViewModel
    {
        return new HttpResponseIViewModel(
            app('view')
                ->make('backend_views.cities.create')
                ->with([
                    'states' => $model->getStates()
                ])
        );
    }
}
