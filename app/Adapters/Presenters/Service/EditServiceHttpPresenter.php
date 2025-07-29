<?php

namespace App\Adapters\Presenters\Service;

use App\Adapters\Presenters\HttpPresenter;
use App\Adapters\ViewModels\HttpResponseIViewModel;
use App\Domain\Interfaces\IViewModel;
use App\Domain\UseCases\Admin\EditAdmin\EditAdminResponseModel;
use App\Domain\UseCases\Service\EditService\EditServiceResponseModel;
use App\Domain\UseCases\Service\EditService\IEditServiceOutputPort;
use Laracasts\Flash\Flash;

class EditServiceHttpPresenter extends HttpPresenter implements IEditServiceOutputPort
{
    public function editService(EditServiceResponseModel $model): IViewModel
    {
        return new HttpResponseIViewModel(
            app('view')
                ->make('backend_views.services.edit')
                ->with([
                    'service' => $model->getService(),
                    'states' => $model->getStates(),
                    'subcategories' => $model->getSubcategories()
                ])
        );
    }

    public function unableToFindService(): IViewModel
    {
        Flash::error(trans("messages.not_found", ['operator' => trans("messages.attributes.service")]));

        return new HttpResponseIViewModel(
            app('redirect')
                ->route(request()->get('guard') . '.services.index')
        );
    }
}
