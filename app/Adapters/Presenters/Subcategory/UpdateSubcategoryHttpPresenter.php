<?php

namespace App\Adapters\Presenters\Subcategory;

use App\Adapters\Presenters\HttpPresenter;
use App\Adapters\ViewModels\HttpResponseIViewModel;
use App\Domain\Interfaces\IViewModel;
use App\Domain\UseCases\Subcategory\UpdateSubcategory\IUpdateSubcategoryOutputPort;
use App\Domain\UseCases\Subcategory\UpdateSubcategory\UpdateSubcategoryResponseModel;
use Laracasts\Flash\Flash;

class UpdateSubcategoryHttpPresenter extends HttpPresenter implements IUpdateSubcategoryOutputPort
{
    public function subcategoryUpdated(UpdateSubcategoryResponseModel $model): IViewModel
    {
        Flash::success(__('messages.updated_successfully', ['operator' => __('messages.attributes.subcategory')]));
        return new HttpResponseIViewModel(
            app('redirect')->route(request()->get('guard').'.subcategories.index')
        );
    }


    public function unableToUpdateSubcategory(UpdateSubcategoryResponseModel $model, \Throwable $e): IViewModel
    {
        if (config('app.debug')) {
            // rethrow and let Laravel display the error
            throw $e;
        }

        Flash::error(trans("messages.error_updating", ['operator' => trans("messages.attributes.Subcategory") . " {$model->getSubcategory()->getName()}"]));

        return new HttpResponseIViewModel(
            app('redirect')
                ->route(request()->get('guard').'.subcategories.index')
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
