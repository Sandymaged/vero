<?php

namespace App\Adapters\Presenters\Service;

use App\Adapters\Presenters\HttpPresenter;
use App\Adapters\ViewModels\HttpResponseIViewModel;
use App\Domain\Interfaces\IViewModel;
use App\Domain\UseCases\Service\DeleteService\DeleteServiceResponseModel;
use App\Domain\UseCases\Service\DeleteService\IDeleteServiceOutputPort;

class DeleteServiceHttpPresenter extends HttpPresenter implements IDeleteServiceOutputPort
{
    public function serviceDeleted(DeleteServiceResponseModel $model): IViewModel
    {
        return new HttpResponseIViewModel(
            response()->json(['messages' => __('messages.deleted_successfully', ['operator' => __('messages.attributes.service')])])
        );
    }


    public function unableToDeleteService(\Throwable $e): IViewModel
    {
        if (config('app.debug')) {
            // rethrow and let Laravel display the error
            throw $e;
        }

        return new HttpResponseIViewModel(
            response()->json(['messages' => trans("messages.error_deleting", ['operator' => trans("messages.attributes.service")])], 500)
        );
    }

    public function unableToFindService(): IViewModel
    {

        return new HttpResponseIViewModel(
            response()->json(['messages' => trans("messages.not_found", ['operator' => trans("messages.attributes.service")])], 404)
        );
    }
}
