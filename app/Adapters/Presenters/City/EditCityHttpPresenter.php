<?php

namespace App\Adapters\Presenters\City;

use App\Adapters\Presenters\HttpPresenter;
use App\Adapters\ViewModels\HttpResponseIViewModel;
use App\Domain\Interfaces\IViewModel;
use App\Domain\UseCases\City\EditCity\EditCityResponseModel;
use App\Domain\UseCases\City\EditCity\IEditCityOutputPort;
use Laracasts\Flash\Flash;

class EditCityHttpPresenter extends HttpPresenter implements IEditCityOutputPort
{
    public function editCity(EditCityResponseModel $model): IViewModel
    {
        return new HttpResponseIViewModel(
            app('view')
                ->make('backend_views.cities.edit')
                ->with([
                    'city' => $model->getCity(),
                    'states' => $model->getStates()
                ])
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
