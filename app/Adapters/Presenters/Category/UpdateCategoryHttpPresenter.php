<?php

namespace App\Adapters\Presenters\Category;

use App\Adapters\Presenters\HttpPresenter;
use App\Adapters\ViewModels\HttpResponseIViewModel;
use App\Domain\Interfaces\IViewModel;
use App\Domain\UseCases\Category\UpdateCategory\IUpdateCategoryOutputPort;
use App\Domain\UseCases\Category\UpdateCategory\UpdateCategoryResponseModel;
use Laracasts\Flash\Flash;

class UpdateCategoryHttpPresenter extends HttpPresenter implements IUpdateCategoryOutputPort
{
    public function categoryUpdated(UpdateCategoryResponseModel $model): IViewModel
    {
        Flash::success(__('messages.updated_successfully', ['operator' => __('messages.attributes.category')]));
        return new HttpResponseIViewModel(
            app('redirect')->route(request()->get('guard').'.categories.index')
        );
    }


    public function unableToUpdateCategory(UpdateCategoryResponseModel $model, \Throwable $e): IViewModel
    {
        if (config('app.debug')) {
            // rethrow and let Laravel display the error
            throw $e;
        }

        Flash::error(trans("messages.error_updating", ['operator' => trans("messages.attributes.Category") . " {$model->getCategory()->getName()}"]));

        return new HttpResponseIViewModel(
            app('redirect')
                ->route(request()->get('guard').'.categories.index')
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
