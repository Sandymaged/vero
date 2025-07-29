<?php

namespace App\Adapters\Presenters\City;

use App\Adapters\Presenters\HttpPresenter;
use App\Adapters\ViewModels\HttpResponseIViewModel;
use App\Domain\Interfaces\IViewModel;
use App\Domain\UseCases\City\ListCity\IListCityOutputPort;
use App\Domain\UseCases\City\ListCity\ListCityResponseModel;

class ListCityHttpPresenter extends HttpPresenter implements IListCityOutputPort
{
    public function cityListed(ListCityResponseModel $model): IViewModel
    {
        return new HttpResponseIViewModel(
            app('view')
                ->make('backend_views.cities.index')
                ->with([
                    'cities' => $model->getCities()
                ])
        );
    }
}
