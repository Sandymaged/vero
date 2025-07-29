<?php

namespace App\Adapters\Presenters\State;

use App\Adapters\Presenters\HttpPresenter;
use App\Adapters\ViewModels\HttpResponseIViewModel;
use App\Domain\Interfaces\IViewModel;
use App\Domain\UseCases\State\CreateState\CreateStateResponseModel;
use App\Domain\UseCases\State\CreateState\ICreateStateOutputPort;

class CreateStateHttpPresenter extends HttpPresenter implements ICreateStateOutputPort
{
    public function createState(CreateStateResponseModel $model): IViewModel
    {
        return new HttpResponseIViewModel(
            app('view')
                ->make('backend_views.states.create')
        );
    }
}
