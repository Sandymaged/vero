<?php

namespace App\Adapters\Presenters\Merchant;

use App\Adapters\Presenters\HttpPresenter;
use App\Adapters\ViewModels\HttpResponseIViewModel;
use App\Domain\Interfaces\IViewModel;
use App\Domain\UseCases\Merchant\UpdateMerchant\IUpdateMerchantOutputPort;
use App\Domain\UseCases\Merchant\UpdateMerchant\UpdateMerchantResponseModel;
use Laracasts\Flash\Flash;

class UpdateMerchantHttpPresenter extends HttpPresenter implements IUpdateMerchantOutputPort
{
    public function merchantUpdated(UpdateMerchantResponseModel $model): IViewModel
    {
        Flash::success(__('messages.updated_successfully', ['operator' => __('messages.attributes.branch')]));
        return new HttpResponseIViewModel(
            app('redirect')->route(request()->get('guard').'.merchants.index')
        );
    }


    public function unableToUpdateMerchant(UpdateMerchantResponseModel $model, \Throwable $e): IViewModel
    {
        if (config('app.debug')) {
            // rethrow and let Laravel display the error
            throw $e;
        }

        Flash::error(trans("messages.error_updating", ['operator' => trans("messages.attributes.Merchant") . " {$model->getMerchant()->getName()}"]));

        return new HttpResponseIViewModel(
            app('redirect')
                ->route(request()->get('guard').'.merchants.index')
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
