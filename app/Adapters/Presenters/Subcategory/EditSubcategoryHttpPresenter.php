<?php

namespace App\Adapters\Presenters\Subcategory;

use App\Adapters\Presenters\HttpPresenter;
use App\Adapters\ViewModels\HttpResponseIViewModel;
use App\Domain\Interfaces\IViewModel;
use App\Domain\UseCases\Subcategory\EditSubcategory\EditSubcategoryResponseModel;
use App\Domain\UseCases\Subcategory\EditSubcategory\IEditSubcategoryOutputPort;
use Laracasts\Flash\Flash;

class EditSubcategoryHttpPresenter extends HttpPresenter implements IEditSubcategoryOutputPort
{
    public function editSubcategory(EditSubcategoryResponseModel $model): IViewModel
    {
        return new HttpResponseIViewModel(
            app('view')
                ->make('backend_views.subcategories.edit')
                ->with([
                    'subcategory' => $model->getSubcategory(),
                    'states' => $model->getStates(),
                    'categories' => $model->getCategories()
                ])
        );
    }

    public function unableToFindSubcategory(): IViewModel
    {
        Flash::error(trans("messages.not_found", ['operator' => trans("messages.attributes.subcategory")]));

        return new HttpResponseIViewModel(
            app('redirect')
                ->route(request()->get('guard') . '.subcategories.index')
        );
    }
}
