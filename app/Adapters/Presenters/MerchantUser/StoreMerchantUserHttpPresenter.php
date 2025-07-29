<?php

namespace App\Adapters\Presenters\MerchantUser;

use App\Adapters\Presenters\HttpPresenter;
use App\Adapters\ViewModels\HttpResponseIViewModel;
use App\Domain\Interfaces\IViewModel;
use App\Domain\UseCases\MerchantUser\StoreMerchantUser\IStoreMerchantUserOutputPort;
use App\Domain\UseCases\MerchantUser\StoreMerchantUser\StoreMerchantUserResponseModel;
use Laracasts\Flash\Flash;

class StoreMerchantUserHttpPresenter extends HttpPresenter implements IStoreMerchantUserOutputPort
{
    public function merchantUserCreated(StoreMerchantUserResponseModel $model): IViewModel
    {
        Flash::success(__('messages.created_successfully', ['operator' => __('messages.attributes.merchant_user')]));
        return new HttpResponseIViewModel(
            app('redirect')->route(request()->get('guard').'.merchantUsers.index')
        );
    }


    public function unableToStoreMerchantUser(StoreMerchantUserResponseModel $model, \Throwable $e): IViewModel
    {
        if (config('app.debug')) {
            // rethrow and let Laravel display the error
            throw $e;
        }

        Flash::error(trans("messages.error_creating", ['operator' => trans("messages.attributes.merchant_user" . " {$model->getMerchantUser()->getName()}")]));

        return new HttpResponseIViewModel(
            app('redirect')
                ->route(request()->get('guard').'.merchantUsers.index')
        );
    }
}
