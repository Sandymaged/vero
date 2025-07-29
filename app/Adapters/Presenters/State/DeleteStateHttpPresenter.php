<?php

namespace App\Adapters\Presenters\State;

use App\Adapters\Presenters\HttpPresenter;
use App\Adapters\ViewModels\HttpResponseIViewModel;
use App\Domain\Interfaces\IViewModel;
use App\Domain\UseCases\State\DeleteState\DeleteStateResponseModel;
use App\Domain\UseCases\State\DeleteState\IDeleteStateOutputPort;

class DeleteStateHttpPresenter extends HttpPresenter implements IDeleteStateOutputPort
{
    public function stateDeleted(DeleteStateResponseModel $model): IViewModel
    {
        return new HttpResponseIViewModel(
            response()->json(['messages' => __('messages.deleted_successfully', ['operator' => __('messages.attributes.state')])])
        );
    }


    public function unableToDeleteState(\Throwable $e): IViewModel
    {
        if (config('app.debug')) {
            // rethrow and let Laravel display the error
            throw $e;
        }

        return new HttpResponseIViewModel(
            response()->json(['messages' => trans("messages.error_deleting", ['operator' => trans("messages.attributes.state")])], 500)
        );
    }

    public function unableToFindState(): IViewModel
    {

        return new HttpResponseIViewModel(
            response()->json(['messages' => trans("messages.not_found", ['operator' => trans("messages.attributes.state")])], 404)
        );
    }
}
