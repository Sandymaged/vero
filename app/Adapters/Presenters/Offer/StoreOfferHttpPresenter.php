<?php

namespace App\Adapters\Presenters\Offer;

use App\Adapters\Presenters\HttpPresenter;
use App\Adapters\ViewModels\HttpResponseIViewModel;
use App\Domain\Interfaces\IViewModel;
use App\Domain\UseCases\Offer\StoreOffer\IStoreOfferOutputPort;
use App\Domain\UseCases\Offer\StoreOffer\StoreOfferResponseModel;
use Laracasts\Flash\Flash;

class StoreOfferHttpPresenter extends HttpPresenter implements IStoreOfferOutputPort
{
    public function offerCreated(StoreOfferResponseModel $model): IViewModel
    {
        Flash::success(__('messages.created_successfully', ['operator' => __('messages.attributes.offer')]));
        return new HttpResponseIViewModel(
            app('redirect')->route(request()->get('guard').'.offers.index')
        );
    }


    public function unableToStoreOffer(StoreOfferResponseModel $model, \Throwable $e): IViewModel
    {
        if (config('app.debug')) {
            // rethrow and let Laravel display the error
            throw $e;
        }

        Flash::error(trans("messages.error_creating", ['operator' => trans("messages.attributes.offer" . " {$model->getOffer()->getName()}")]));

        return new HttpResponseIViewModel(
            app('redirect')
                ->route(request()->get('guard').'.offers.index')
        );
    }
}
