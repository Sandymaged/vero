<?php

namespace App\Adapters\Presenters\Offer;

use App\Adapters\Presenters\HttpPresenter;
use App\Adapters\ViewModels\HttpResponseIViewModel;
use App\Domain\Interfaces\IViewModel;
use App\Domain\UseCases\Offer\UpdateOffer\IUpdateOfferOutputPort;
use App\Domain\UseCases\Offer\UpdateOffer\UpdateOfferResponseModel;
use Laracasts\Flash\Flash;

class UpdateOfferHttpPresenter extends HttpPresenter implements IUpdateOfferOutputPort
{
    public function offerUpdated(UpdateOfferResponseModel $model): IViewModel
    {
        Flash::success(__('messages.updated_successfully', ['operator' => __('messages.attributes.offer')]));
        return new HttpResponseIViewModel(
            app('redirect')->route(request()->get('guard').'.offers.index')
        );
    }


    public function unableToUpdateOffer(UpdateOfferResponseModel $model, \Throwable $e): IViewModel
    {
        if (config('app.debug')) {
            // rethrow and let Laravel display the error
            throw $e;
        }

        Flash::error(trans("messages.error_updating", ['operator' => trans("messages.attributes.Offer") . " {$model->getOffer()->getName()}"]));

        return new HttpResponseIViewModel(
            app('redirect')
                ->route(request()->get('guard').'.offers.index')
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
