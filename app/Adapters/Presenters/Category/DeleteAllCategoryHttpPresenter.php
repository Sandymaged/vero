<?php

namespace App\Adapters\Presenters\Category;

use App\Adapters\Presenters\HttpPresenter;
use App\Adapters\ViewModels\HttpResponseIViewModel;
use App\Domain\Interfaces\IViewModel;
use App\Domain\UseCases\Category\DeleteAllCategory\IDeleteAllCategoryOutputPort;

class DeleteAllCategoryHttpPresenter extends HttpPresenter implements IDeleteAllCategoryOutputPort
{
    public function categoriesDeleted(): IViewModel
    {
        return new HttpResponseIViewModel(
            response()->json(['messages' => __('messages.deleted_successfully', ['operator' => __('messages.attributes.categories')])])
        );
    }


    public function unableToDeleteAllCategory(\Throwable $e): IViewModel
    {
        if (config('app.debug')) {
            // rethrow and let Laravel display the error
            throw $e;
        }

        return new HttpResponseIViewModel(
            response()->json(['messages' => trans("messages.error_deleting", ['operator' => trans("messages.attributes.categories")])], 500)
        );
    }
}
