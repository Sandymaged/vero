<?php

namespace App\Adapters\Presenters\State;

use App\Adapters\Presenters\HttpPresenter;
use App\Adapters\ViewModels\HttpResponseIViewModel;
use App\Domain\Interfaces\IViewModel;
use App\Domain\UseCases\State\ListState\IListStateOutputPort;
use App\Domain\UseCases\State\ListState\ListStateResponseModel;

class ListStateHttpPresenter extends HttpPresenter implements IListStateOutputPort
{
    public function stateListed(ListStateResponseModel $model): IViewModel
    {
        return new HttpResponseIViewModel(
            app('view')
                ->make('backend_views.states.index')
                ->with([
                    'states' => $model->getStates()
                ])
        );
    }
}
