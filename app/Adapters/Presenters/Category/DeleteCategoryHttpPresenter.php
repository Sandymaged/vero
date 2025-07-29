<?php

namespace App\Adapters\Presenters\Category;

use App\Adapters\Presenters\HttpPresenter;
use App\Adapters\ViewModels\HttpResponseIViewModel;
use App\Domain\Interfaces\IViewModel;
use App\Domain\UseCases\Category\DeleteCategory\DeleteCategoryResponseModel;
use App\Domain\UseCases\Category\DeleteCategory\IDeleteCategoryOutputPort;

class DeleteCategoryHttpPresenter extends HttpPresenter implements IDeleteCategoryOutputPort
{
    public function categoryDeleted(DeleteCategoryResponseModel $model): IViewModel
    {
        return new HttpResponseIViewModel(
            response()->json(['messages' => __('messages.deleted_successfully', ['operator' => __('messages.attributes.category')])])
        );
    }


    public function unableToDeleteCategory(\Throwable $e): IViewModel
    {
        if (config('app.debug')) {
            // rethrow and let Laravel display the error
            throw $e;
        }

        return new HttpResponseIViewModel(
            response()->json(['messages' => trans("messages.error_deleting", ['operator' => trans("messages.attributes.category")])], 500)
        );
    }

    public function unableToFindCategory(): IViewModel
    {

        return new HttpResponseIViewModel(
            response()->json(['messages' => trans("messages.not_found", ['operator' => trans("messages.attributes.category")])], 404)
        );
    }
}
