<?php

namespace App\Adapters\Presenters\Subcategory;

use App\Adapters\Presenters\HttpPresenter;
use App\Adapters\ViewModels\HttpResponseIViewModel;
use App\Domain\Interfaces\IViewModel;
use App\Domain\UseCases\Subcategory\ListSubcategory\IListSubcategoryOutputPort;
use App\Domain\UseCases\Subcategory\ListSubcategory\ListSubcategoryResponseModel;

class ListSubcategoryHttpPresenter extends HttpPresenter implements IListSubcategoryOutputPort
{
    public function subcategoryListed(ListSubcategoryResponseModel $model): IViewModel
    {
        return new HttpResponseIViewModel(
            app('view')
                ->make('backend_views.subcategories.index')
                ->with([
                    'subcategories' => $model->getSubcategorys()
                ])
        );
    }
}
