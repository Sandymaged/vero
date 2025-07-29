<?php

namespace App\Adapters\Presenters\MerchantUser;

use App\Adapters\Presenters\HttpPresenter;
use App\Adapters\ViewModels\HttpResponseIViewModel;
use App\Domain\Interfaces\IViewModel;
use App\Domain\UseCases\MerchantUser\ListMerchantUser\IListMerchantUserOutputPort;
use App\Domain\UseCases\MerchantUser\ListMerchantUser\ListMerchantUserResponseModel;

class ListMerchantUserHttpPresenter extends HttpPresenter implements IListMerchantUserOutputPort
{
    public function merchantUserListed(ListMerchantUserResponseModel $model): IViewModel
    {
        return new HttpResponseIViewModel(
            app('view')
                ->make('backend_views.merchant_users.index')
                ->with([
                    'merchantUsers' => $model->getMerchantUsers(),
                ])
        );
    }
}
