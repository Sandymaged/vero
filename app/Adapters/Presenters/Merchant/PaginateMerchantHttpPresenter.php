<?php

namespace App\Adapters\Presenters\Merchant;

use App\Adapters\Presenters\HttpPresenter;
use App\Adapters\ViewModels\HttpResponseIViewModel;
use App\Domain\Interfaces\IViewModel;
use App\Domain\UseCases\Merchant\PaginateMerchant\IPaginateMerchantOutputPort;
use App\Domain\UseCases\Merchant\PaginateMerchant\PaginateMerchantResponseModel;

class PaginateMerchantHttpPresenter extends HttpPresenter implements IPaginateMerchantOutputPort
{
    public function merchantPaginateed(PaginateMerchantResponseModel $model): IViewModel
    {
        return new HttpResponseIViewModel(
            $model->getMerchants()
        );
    }
}
