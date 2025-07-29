<?php

namespace App\Adapters\Presenters\MerchantBranch;

use App\Adapters\Presenters\HttpPresenter;
use App\Adapters\ViewModels\HttpResponseIViewModel;
use App\Domain\Interfaces\IViewModel;
use App\Domain\UseCases\MerchantBranch\StoreMerchantBranch\IStoreMerchantBranchOutputPort;
use App\Domain\UseCases\MerchantBranch\StoreMerchantBranch\StoreMerchantBranchResponseModel;
use Laracasts\Flash\Flash;

class StoreMerchantBranchHttpPresenter extends HttpPresenter implements IStoreMerchantBranchOutputPort
{
    public function merchantBranchCreated(StoreMerchantBranchResponseModel $model): IViewModel
    {
        Flash::success(__('messages.created_successfully', ['operator' => __('messages.attributes.branch')]));
        return new HttpResponseIViewModel(
            app('redirect')->route(request()->get('guard').'.merchantBranches.index')
        );
    }


    public function unableToStoreMerchantBranch(StoreMerchantBranchResponseModel $model, \Throwable $e): IViewModel
    {
        if (config('app.debug')) {
            // rethrow and let Laravel display the error
            throw $e;
        }

        Flash::error(trans("messages.error_creating", ['operator' => trans("messages.attributes.merchant_branch" . " {$model->getMerchantBranch()->getName()}")]));

        return new HttpResponseIViewModel(
            app('redirect')
                ->route(request()->get('guard').'.merchantBranches.index')
        );
    }
}
