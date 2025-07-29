<?php

namespace App\Adapters\Presenters\Category;

use App\Adapters\Presenters\HttpPresenter;
use App\Adapters\ViewModels\HttpResponseIViewModel;
use App\Domain\Interfaces\IViewModel;
use App\Domain\UseCases\Category\StoreCategory\IStoreCategoryOutputPort;
use App\Domain\UseCases\Category\StoreCategory\StoreCategoryResponseModel;
use Laracasts\Flash\Flash;

class StoreCategoryHttpPresenter extends HttpPresenter implements IStoreCategoryOutputPort
{
    public function categoryCreated(StoreCategoryResponseModel $model): IViewModel
    {
        Flash::success(__('messages.created_successfully', ['operator' => __('messages.attributes.category')]));
        return new HttpResponseIViewModel(
            app('redirect')->route(request()->get('guard').'.categories.index')
        );
    }


    public function unableToStoreCategory(StoreCategoryResponseModel $model, \Throwable $e): IViewModel
    {
        if (config('app.debug')) {
            // rethrow and let Laravel display the error
            throw $e;
        }

        Flash::error(trans("messages.error_creating", ['operator' => trans("messages.attributes.category" . " {$model->getCategory()->getName()}")]));

        return new HttpResponseIViewModel(
            app('redirect')
                ->route(request()->get('guard').'.categories.index')
        );
    }
}
