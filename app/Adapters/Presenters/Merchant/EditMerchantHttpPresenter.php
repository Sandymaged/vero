<?php

namespace App\Adapters\Presenters\Merchant;

use App\Adapters\Presenters\HttpPresenter;
use App\Adapters\ViewModels\HttpResponseIViewModel;
use App\Domain\Interfaces\IViewModel;
use App\Domain\UseCases\Merchant\EditMerchant\EditMerchantResponseModel;
use App\Domain\UseCases\Merchant\EditMerchant\IEditMerchantOutputPort;
use Laracasts\Flash\Flash;

class EditMerchantHttpPresenter extends HttpPresenter implements IEditMerchantOutputPort
{
    public function editMerchant(EditMerchantResponseModel $model): IViewModel
    {
        return new HttpResponseIViewModel(
            app('view')
                ->make('backend_views.merchants.edit')
                ->with([
                    'merchant' => $model->getMerchant(),
                    'states' => $model->getStates()
                ])
        );
    }

    public function unableToFindMerchant(): IViewModel
    {


        Flash::error(trans("messages.not_found", ['operator' => trans("messages.attributes.merchant")]));

        return new HttpResponseIViewModel(
            app('redirect')
                ->route(request()->get('guard') . '.merchants.index')
        );
    }
}
