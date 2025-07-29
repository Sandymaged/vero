<?php

namespace App\Adapters\Presenters\Service;

use App\Adapters\Presenters\HttpPresenter;
use App\Adapters\ViewModels\HttpResponseIViewModel;
use App\Domain\Interfaces\IViewModel;
use App\Domain\UseCases\Service\DeleteAllService\IDeleteAllServiceOutputPort;

class DeleteAllServiceHttpPresenter extends HttpPresenter implements IDeleteAllServiceOutputPort
{
    public function servicesDeleted(): IViewModel
    {
        return new HttpResponseIViewModel(
            response()->json(['messages' => __('messages.deleted_successfully', ['operator' => __('messages.attributes.services')])])
        );
    }


    public function unableToDeleteAllService(\Throwable $e): IViewModel
    {
        if (config('app.debug')) {
            // rethrow and let Laravel display the error
            throw $e;
        }

        return new HttpResponseIViewModel(
            response()->json(['messages' => trans("messages.error_deleting", ['operator' => trans("messages.attributes.services")])], 500)
        );
    }
}
