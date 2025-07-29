<?php

namespace App\Adapters\Presenters\Offer;

use App\Adapters\Presenters\HttpPresenter;
use App\Adapters\ViewModels\HttpResponseIViewModel;
use App\Domain\Interfaces\IViewModel;
use App\Domain\UseCases\Offer\DeleteOffer\DeleteOfferResponseModel;
use App\Domain\UseCases\Offer\DeleteOffer\IDeleteOfferOutputPort;

class DeleteOfferHttpPresenter extends HttpPresenter implements IDeleteOfferOutputPort
{
    public function offerDeleted(DeleteOfferResponseModel $model): IViewModel
    {
        return new HttpResponseIViewModel(
            response()->json(['messages' => __('messages.deleted_successfully', ['operator' => __('messages.attributes.offer')])])
        );
    }


    public function unableToDeleteOffer(\Throwable $e): IViewModel
    {
        if (config('app.debug')) {
            // rethrow and let Laravel display the error
            throw $e;
        }

        return new HttpResponseIViewModel(
            response()->json(['messages' => trans("messages.error_deleting", ['operator' => trans("messages.attributes.offer")])], 500)
        );
    }

    public function unableToFindOffer(): IViewModel
    {

        return new HttpResponseIViewModel(
            response()->json(['messages' => trans("messages.not_found", ['operator' => trans("messages.attributes.offer")])], 404)
        );
    }
}
