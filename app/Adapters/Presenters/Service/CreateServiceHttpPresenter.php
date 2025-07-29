<?php

namespace App\Adapters\Presenters\Service;

use App\Adapters\Presenters\HttpPresenter;
use App\Adapters\ViewModels\HttpResponseIViewModel;
use App\Domain\Interfaces\IViewModel;
use App\Domain\UseCases\Service\CreateService\CreateServiceResponseModel;
use App\Domain\UseCases\Service\CreateService\ICreateServiceOutputPort;

class CreateServiceHttpPresenter extends HttpPresenter implements ICreateServiceOutputPort
{
    public function createService(CreateServiceResponseModel $model): IViewModel
    {
        return new HttpResponseIViewModel(
            app('view')
                ->make('backend_views.services.create')
                ->with([
                    'states' => $model->getStates(),
                    'subcategories' => $model->getSubcategories()
                ])
        );
    }
}
