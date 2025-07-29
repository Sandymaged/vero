<?php

namespace App\Adapters\Presenters\Offer;

use App\Adapters\Presenters\HttpPresenter;
use App\Adapters\ViewModels\HttpResponseIViewModel;
use App\Domain\Interfaces\IViewModel;
use App\Domain\UseCases\Offer\DeleteAllOffer\IDeleteAllOfferOutputPort;

class DeleteAllOfferHttpPresenter extends HttpPresenter implements IDeleteAllOfferOutputPort
{
    public function offersDeleted(): IViewModel
    {
        return new HttpResponseIViewModel(
            response()->json(['messages' => __('messages.deleted_successfully', ['operator' => __('messages.attributes.offers')])])
        );
    }


    public function unableToDeleteAllOffer(\Throwable $e): IViewModel
    {
        if (config('app.debug')) {
            // rethrow and let Laravel display the error
            throw $e;
        }

        return new HttpResponseIViewModel(
            response()->json(['messages' => trans("messages.error_deleting", ['operator' => trans("messages.attributes.offers")])], 500)
        );
    }
}
