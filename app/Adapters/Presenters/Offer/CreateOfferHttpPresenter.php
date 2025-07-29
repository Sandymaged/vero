<?php

namespace App\Adapters\Presenters\Offer;

use App\Adapters\Presenters\HttpPresenter;
use App\Adapters\ViewModels\HttpResponseIViewModel;
use App\Domain\Interfaces\IViewModel;
use App\Domain\UseCases\Offer\CreateOffer\CreateOfferResponseModel;
use App\Domain\UseCases\Offer\CreateOffer\ICreateOfferOutputPort;

class CreateOfferHttpPresenter extends HttpPresenter implements ICreateOfferOutputPort
{
    public function createOffer(CreateOfferResponseModel $model): IViewModel
    {
        return new HttpResponseIViewModel(
            app('view')
                ->make('backend_views.offers.create')
                ->with([
                    'merchants' => $model->getMerchants(),
                    'merchantBranches' => $model->getMerchantBranches(),
                    'categories' => $model->getCategories()
                ])
        );
    }
}
