<?php

namespace App\Adapters\Presenters\Offer;

use App\Adapters\Presenters\HttpPresenter;
use App\Adapters\ViewModels\HttpResponseIViewModel;
use App\Domain\Interfaces\IViewModel;
use App\Domain\UseCases\Offer\EditOffer\EditOfferResponseModel;
use App\Domain\UseCases\Offer\EditOffer\IEditOfferOutputPort;
use Laracasts\Flash\Flash;

class EditOfferHttpPresenter extends HttpPresenter implements IEditOfferOutputPort
{
    public function editOffer(EditOfferResponseModel $model): IViewModel
    {
        return new HttpResponseIViewModel(
            app('view')
                ->make('backend_views.offers.edit')
                ->with([
                    'offer' => $model->getOffer(),
                    'merchants' => $model->getMerchants(),
                    'merchantBranches' => $model->getMerchantBranches(),
                    'categories' => $model->getCategories()
                ])
        );
    }

    public function unableToFindOffer(): IViewModel
    {

        Flash::error(trans("messages.not_found", ['operator' => trans("messages.attributes.offer")]));

        return new HttpResponseIViewModel(
            app('redirect')
                ->route(request()->get('guard') . '.offers.index')
        );
    }
}
