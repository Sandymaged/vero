<?php

namespace App\Adapters\Presenters\Merchant;

use App\Adapters\Presenters\HttpPresenter;
use App\Adapters\ViewModels\HttpResponseIViewModel;
use App\Domain\Interfaces\IViewModel;
use App\Domain\UseCases\Merchant\StoreMerchant\IStoreMerchantOutputPort;
use App\Domain\UseCases\Merchant\StoreMerchant\StoreMerchantResponseModel;
use Laracasts\Flash\Flash;

class StoreMerchantHttpPresenter extends HttpPresenter implements IStoreMerchantOutputPort
{
    public function merchantCreated(StoreMerchantResponseModel $model): IViewModel
    {
        Flash::success(__('messages.created_successfully', ['operator' => __('messages.attributes.branch')]));
        return new HttpResponseIViewModel(
            app('redirect')->route(request()->get('guard').'.merchants.index')
        );
    }


    public function unableToStoreMerchant(StoreMerchantResponseModel $model, \Throwable $e): IViewModel
    {
        if (config('app.debug')) {
            // rethrow and let Laravel display the error
            throw $e;
        }

        Flash::error(trans("messages.error_creating", ['operator' => trans("messages.attributes.merchant" . " {$model->getMerchant()->getName()}")]));

        return new HttpResponseIViewModel(
            app('redirect')
                ->route(request()->get('guard').'.merchants.index')
        );
    }
}
