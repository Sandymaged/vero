<?php

namespace App\Adapters\Presenters\Offer;

use App\Adapters\Presenters\HttpPresenter;
use App\Adapters\ViewModels\HttpResponseIViewModel;
use App\Domain\Interfaces\IViewModel;
use App\Domain\UseCases\Offer\ListOffer\IListOfferOutputPort;
use App\Domain\UseCases\Offer\ListOffer\ListOfferResponseModel;

class ListOfferHttpPresenter extends HttpPresenter implements IListOfferOutputPort
{
    public function offerListed(ListOfferResponseModel $model): IViewModel
    {
        return new HttpResponseIViewModel(
            app('view')
                ->make('backend_views.offers.index')
                ->with([
                    'offers' => $model->getOffers()
                ])
        );
    }
}
