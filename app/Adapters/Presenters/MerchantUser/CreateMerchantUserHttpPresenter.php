<?php

namespace App\Adapters\Presenters\MerchantUser;

use App\Adapters\Presenters\HttpPresenter;
use App\Adapters\ViewModels\HttpResponseIViewModel;
use App\Domain\Interfaces\IViewModel;
use App\Domain\UseCases\MerchantUser\CreateMerchantUser\CreateMerchantUserResponseModel;
use App\Domain\UseCases\MerchantUser\CreateMerchantUser\ICreateMerchantUserOutputPort;

class CreateMerchantUserHttpPresenter extends HttpPresenter implements ICreateMerchantUserOutputPort
{
    public function createMerchantUser(CreateMerchantUserResponseModel $model): IViewModel
    {
        return new HttpResponseIViewModel(
            app('view')
                ->make('backend_views.merchant_users.create')
                ->with([
                    'merchantBranches' => $model->getMerchantBranches(),
                    'merchants' => $model->getMerchants()
                ])
        );
    }
}
