<?php

namespace App\Adapters\Presenters\Service;

use App\Adapters\Presenters\HttpPresenter;
use App\Adapters\ViewModels\HttpResponseIViewModel;
use App\Domain\Interfaces\IViewModel;
use App\Domain\UseCases\Service\ListService\IListServiceOutputPort;
use App\Domain\UseCases\Service\ListService\ListServiceResponseModel;

class ListServiceHttpPresenter extends HttpPresenter implements IListServiceOutputPort
{
    public function serviceListed(ListServiceResponseModel $model): IViewModel
    {
        return new HttpResponseIViewModel(
            app('view')
                ->make('backend_views.services.index')
                ->with([
                    'services' => $model->getServices()
                ])
        );
    }
}
