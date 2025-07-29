<?php

namespace App\Adapters\Presenters\Category;

use App\Adapters\Presenters\HttpPresenter;
use App\Adapters\ViewModels\HttpResponseIViewModel;
use App\Domain\Interfaces\IViewModel;
use App\Domain\UseCases\Category\ListCategory\IListCategoryOutputPort;
use App\Domain\UseCases\Category\ListCategory\ListCategoryResponseModel;

class ListCategoryHttpPresenter extends HttpPresenter implements IListCategoryOutputPort
{
    public function categoryListed(ListCategoryResponseModel $model): IViewModel
    {
        return new HttpResponseIViewModel(
            app('view')
                ->make('backend_views.categories.index')
                ->with([
                    'categories' => $model->getCategorys()
                ])
        );
    }
}
