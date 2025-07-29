<?php

namespace App\Adapters\Presenters\MerchantUser;

use App\Adapters\Presenters\HttpPresenter;
use App\Adapters\ViewModels\HttpResponseIViewModel;
use App\Domain\Interfaces\IViewModel;
use App\Domain\UseCases\MerchantUser\UpdateMerchantUser\IUpdateMerchantUserOutputPort;
use App\Domain\UseCases\MerchantUser\UpdateMerchantUser\UpdateMerchantUserResponseModel;
use Laracasts\Flash\Flash;

class UpdateMerchantUserHttpPresenter extends HttpPresenter implements IUpdateMerchantUserOutputPort
{
    public function merchantUserUpdated(UpdateMerchantUserResponseModel $model): IViewModel
    {
        Flash::success(__('messages.updated_successfully', ['operator' => __('messages.attributes.merchant_user')]));
        return new HttpResponseIViewModel(
            app('redirect')->route(request()->get('guard').'.merchantUsers.index')
        );
    }


    public function unableToUpdateMerchantUser(UpdateMerchantUserResponseModel $model, \Throwable $e): IViewModel
    {
        if (config('app.debug')) {
            // rethrow and let Laravel display the error
            throw $e;
        }

        Flash::error(trans("messages.error_updating", ['operator' => trans("messages.attributes.Merchant_user") . " {$model->getMerchantUser()->getName()}"]));

        return new HttpResponseIViewModel(
            app('redirect')
                ->route(request()->get('guard').'.merchantUsers.index')
        );
    }

    public function unableToFindMerchantUser(): IViewModel
    {

        Flash::error(trans("messages.not_found", ['operator' => trans("messages.attributes.merchant_user")]));

        return new HttpResponseIViewModel(
            app('redirect')
                ->route(request()->get('guard') . '.merchantUsers.index')
        );
    }
}
