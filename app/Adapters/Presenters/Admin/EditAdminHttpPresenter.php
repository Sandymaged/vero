<?php

namespace App\Adapters\Presenters\Admin;

use App\Adapters\Presenters\HttpPresenter;
use App\Adapters\ViewModels\HttpResponseIViewModel;
use App\Domain\Interfaces\IViewModel;
use App\Domain\UseCases\Admin\EditAdmin\EditAdminResponseModel;
use App\Domain\UseCases\Admin\EditAdmin\IEditAdminOutputPort;
use Laracasts\Flash\Flash;

class EditAdminHttpPresenter extends HttpPresenter implements IEditAdminOutputPort
{
    public function editAdmin(EditAdminResponseModel $model): IViewModel
    {
        return new HttpResponseIViewModel(
            app('view')
                ->make('backend_views.admins.edit')
                ->with([
                    'roles' => $model->getRoles(),
                    'admin' => $model->getAdmin()
                ])
        );
    }

    public function unableToFindAdmin(): IViewModel
    {

        Flash::error(trans("messages.not_found", ['operator' => trans("messages.attributes.admin")]));

        return new HttpResponseIViewModel(
            app('redirect')
                ->route(request()->get('guard') . '.admins.index')
        );
    }
}
