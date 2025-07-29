<?php

namespace App\Adapters\Presenters\Category;

use App\Adapters\Presenters\HttpPresenter;
use App\Adapters\ViewModels\HttpResponseIViewModel;
use App\Domain\Interfaces\IViewModel;
use App\Domain\UseCases\Category\CreateCategory\CreateCategoryResponseModel;
use App\Domain\UseCases\Category\CreateCategory\ICreateCategoryOutputPort;

class CreateCategoryHttpPresenter extends HttpPresenter implements ICreateCategoryOutputPort
{
    public function createCategory(CreateCategoryResponseModel $model): IViewModel
    {
        return new HttpResponseIViewModel(
            app('view')
                ->make('backend_views.categories.create')
                ->with([
                    'states' => $model->getStates()
                ])
        );
    }
}
