<?php

namespace App\Adapters\Presenters\State;

use App\Adapters\Presenters\HttpPresenter;
use App\Adapters\ViewModels\HttpResponseIViewModel;
use App\Domain\Interfaces\IViewModel;
use App\Domain\UseCases\State\EditState\EditStateResponseModel;
use App\Domain\UseCases\State\EditState\IEditStateOutputPort;
use Laracasts\Flash\Flash;

class EditStateHttpPresenter extends HttpPresenter implements IEditStateOutputPort
{
    public function editState(EditStateResponseModel $model): IViewModel
    {
        return new HttpResponseIViewModel(
            app('view')
                ->make('backend_views.states.edit')
                ->with([
                    'state' => $model->getState()
                ])
        );
    }

    public function unableToFindState(): IViewModel
    {
        Flash::error(trans("messages.not_found", ['operator' => trans("messages.attributes.state")]));

        return new HttpResponseIViewModel(
            app('redirect')
                ->route(request()->get('guard') . '.states.index')
        );
    }
}
