<?php

namespace App\Adapters\Presenters\Subcategory;

use App\Adapters\Presenters\HttpPresenter;
use App\Adapters\ViewModels\HttpResponseIViewModel;
use App\Domain\Interfaces\IViewModel;
use App\Domain\UseCases\Subcategory\StoreSubcategory\IStoreSubcategoryOutputPort;
use App\Domain\UseCases\Subcategory\StoreSubcategory\StoreSubcategoryResponseModel;
use Laracasts\Flash\Flash;

class StoreSubcategoryHttpPresenter extends HttpPresenter implements IStoreSubcategoryOutputPort
{
    public function subcategoryCreated(StoreSubcategoryResponseModel $model): IViewModel
    {
        Flash::success(__('messages.created_successfully', ['operator' => __('messages.attributes.subcategory')]));
        return new HttpResponseIViewModel(
            app('redirect')->route(request()->get('guard').'.subcategories.index')
        );
    }


    public function unableToStoreSubcategory(StoreSubcategoryResponseModel $model, \Throwable $e): IViewModel
    {
        if (config('app.debug')) {
            // rethrow and let Laravel display the error
            throw $e;
        }

        Flash::error(trans("messages.error_creating", ['operator' => trans("messages.attributes.subcategory" . " {$model->getSubcategory()->getName()}")]));

        return new HttpResponseIViewModel(
            app('redirect')
                ->route(request()->get('guard').'.subcategories.index')
        );
    }
}
