<?php

namespace App\Adapters\Presenters\Merchant;

use App\Adapters\Presenters\HttpPresenter;
use App\Adapters\ViewModels\HttpResponseIViewModel;
use App\Domain\Interfaces\IViewModel;
use App\Domain\UseCases\Merchant\CreateMerchant\CreateMerchantResponseModel;
use App\Domain\UseCases\Merchant\CreateMerchant\ICreateMerchantOutputPort;

class CreateMerchantHttpPresenter extends HttpPresenter implements ICreateMerchantOutputPort
{
    public function createMerchant(CreateMerchantResponseModel $model): IViewModel
    {
        return new HttpResponseIViewModel(
            app('view')
                ->make('backend_views.merchants.create')
                ->with([
                    'states' => $model->getStates()
                ])
        );
    }
}
