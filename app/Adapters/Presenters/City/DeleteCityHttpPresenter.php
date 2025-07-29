<?php

namespace App\Adapters\Presenters\City;

use App\Adapters\Presenters\HttpPresenter;
use App\Adapters\ViewModels\HttpResponseIViewModel;
use App\Domain\Interfaces\IViewModel;
use App\Domain\UseCases\City\DeleteCity\DeleteCityResponseModel;
use App\Domain\UseCases\City\DeleteCity\IDeleteCityOutputPort;

class DeleteCityHttpPresenter extends HttpPresenter implements IDeleteCityOutputPort
{
    public function cityDeleted(DeleteCityResponseModel $model): IViewModel
    {
        return new HttpResponseIViewModel(
            response()->json(['messages' => __('messages.deleted_successfully', ['operator' => __('messages.attributes.city')])])
        );
    }


    public function unableToDeleteCity(\Throwable $e): IViewModel
    {
        if (config('app.debug')) {
            // rethrow and let Laravel display the error
            throw $e;
        }

        return new HttpResponseIViewModel(
            response()->json(['messages' => trans("messages.error_deleting", ['operator' => trans("messages.attributes.city")])], 500)
        );
    }

    public function unableToFindCity(): IViewModel
    {

        return new HttpResponseIViewModel(
            response()->json(['messages' => trans("messages.not_found", ['operator' => trans("messages.attributes.city")])], 404)
        );
    }
}
