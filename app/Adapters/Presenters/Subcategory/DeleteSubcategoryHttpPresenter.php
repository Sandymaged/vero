<?php

namespace App\Adapters\Presenters\Subcategory;

use App\Adapters\Presenters\HttpPresenter;
use App\Adapters\ViewModels\HttpResponseIViewModel;
use App\Domain\Interfaces\IViewModel;
use App\Domain\UseCases\Subcategory\DeleteSubcategory\DeleteSubcategoryResponseModel;
use App\Domain\UseCases\Subcategory\DeleteSubcategory\IDeleteSubcategoryOutputPort;

class DeleteSubcategoryHttpPresenter extends HttpPresenter implements IDeleteSubcategoryOutputPort
{
    public function subcategoryDeleted(DeleteSubcategoryResponseModel $model): IViewModel
    {
        return new HttpResponseIViewModel(
            response()->json(['messages' => __('messages.deleted_successfully', ['operator' => __('messages.attributes.subcategory')])])
        );
    }


    public function unableToDeleteSubcategory(\Throwable $e): IViewModel
    {
        if (config('app.debug')) {
            // rethrow and let Laravel display the error
            throw $e;
        }

        return new HttpResponseIViewModel(
            response()->json(['messages' => trans("messages.error_deleting", ['operator' => trans("messages.attributes.subcategory")])], 500)
        );
    }

    public function unableToFindSubcategory(): IViewModel
    {

        return new HttpResponseIViewModel(
            response()->json(['messages' => trans("messages.not_found", ['operator' => trans("messages.attributes.subcategory")])], 404)
        );
    }
}
