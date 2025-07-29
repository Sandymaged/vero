<?php

namespace App\Adapters\Presenters\Category;

use App\Adapters\Presenters\HttpPresenter;
use App\Adapters\ViewModels\HttpResponseIViewModel;
use App\Domain\Interfaces\IViewModel;
use App\Domain\UseCases\Category\EditCategory\EditCategoryResponseModel;
use App\Domain\UseCases\Category\EditCategory\IEditCategoryOutputPort;
use Laracasts\Flash\Flash;

class EditCategoryHttpPresenter extends HttpPresenter implements IEditCategoryOutputPort
{
    public function editCategory(EditCategoryResponseModel $model): IViewModel
    {
        return new HttpResponseIViewModel(
            app('view')
                ->make('backend_views.categories.edit')
                ->with([
                    'category' => $model->getCategory(),
                    'states' => $model->getStates()
                ])
        );
    }

    public function unableToFindCategory(): IViewModel
    {
        Flash::error(trans("messages.not_found", ['operator' => trans("messages.attributes.category")]));

        return new HttpResponseIViewModel(
            app('redirect')
                ->route(request()->get('guard') . '.categories.index')
        );
    }
}
