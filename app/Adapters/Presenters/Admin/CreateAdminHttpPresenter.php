<?php

namespace App\Adapters\Presenters\Admin;

use App\Adapters\Presenters\HttpPresenter;
use App\Adapters\ViewModels\HttpResponseIViewModel;
use App\Domain\Interfaces\IViewModel;
use App\Domain\UseCases\Admin\CreateAdmin\CreateAdminResponseModel;
use App\Domain\UseCases\Admin\CreateAdmin\ICreateAdminOutputPort;

class CreateAdminHttpPresenter extends HttpPresenter implements ICreateAdminOutputPort
{
    public function createAdmin(CreateAdminResponseModel $model): IViewModel
    {
        return new HttpResponseIViewModel(
            app('view')
                ->make('backend_views.admins.create')
                ->with([
                    'roles' => $model->getRoles()
                ])
        );
    }
}
