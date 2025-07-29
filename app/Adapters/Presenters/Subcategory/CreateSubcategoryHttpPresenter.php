<?php

namespace App\Adapters\Presenters\Subcategory;

use App\Adapters\Presenters\HttpPresenter;
use App\Adapters\ViewModels\HttpResponseIViewModel;
use App\Domain\Interfaces\IViewModel;
use App\Domain\UseCases\Subcategory\CreateSubcategory\CreateSubcategoryResponseModel;
use App\Domain\UseCases\Subcategory\CreateSubcategory\ICreateSubcategoryOutputPort;

class CreateSubcategoryHttpPresenter extends HttpPresenter implements ICreateSubcategoryOutputPort
{
    public function createSubcategory(CreateSubcategoryResponseModel $model): IViewModel
    {
        return new HttpResponseIViewModel(
            app('view')
                ->make('backend_views.subcategories.create')
                ->with([
                    'states' => $model->getStates(),
                    'categories' => $model->getCategories()
                ])
        );
    }
}
