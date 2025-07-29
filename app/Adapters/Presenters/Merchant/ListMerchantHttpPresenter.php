<?php

namespace App\Adapters\Presenters\Merchant;

use App\Adapters\Presenters\HttpPresenter;
use App\Adapters\ViewModels\HttpResponseIViewModel;
use App\Domain\Interfaces\IViewModel;
use App\Domain\UseCases\Merchant\ListMerchant\IListMerchantOutputPort;
use App\Domain\UseCases\Merchant\ListMerchant\ListMerchantResponseModel;

class ListMerchantHttpPresenter extends HttpPresenter implements IListMerchantOutputPort
{
    public function merchantListed(ListMerchantResponseModel $model): IViewModel
    {
        return new HttpResponseIViewModel(
            app('view')
                ->make('backend_views.merchants.index')
                ->with([
                    'states' => $model->getStates(),
                ])
        );
    }
}
