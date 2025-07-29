<?php

namespace App\Adapters\Presenters\MerchantBranch;

use App\Adapters\Presenters\HttpPresenter;
use App\Adapters\ViewModels\HttpResponseIViewModel;
use App\Domain\Interfaces\IViewModel;
use App\Domain\UseCases\MerchantBranch\UpdateMerchantBranch\IUpdateMerchantBranchOutputPort;
use App\Domain\UseCases\MerchantBranch\UpdateMerchantBranch\UpdateMerchantBranchResponseModel;
use Laracasts\Flash\Flash;

class UpdateMerchantBranchHttpPresenter extends HttpPresenter implements IUpdateMerchantBranchOutputPort
{
    public function merchantBranchUpdated(UpdateMerchantBranchResponseModel $model): IViewModel
    {
        Flash::success(__('messages.updated_successfully', ['operator' => __('messages.attributes.branch')]));
        return new HttpResponseIViewModel(
            app('redirect')->route(request()->get('guard').'.merchantBranches.index')
        );
    }


    public function unableToUpdateMerchantBranch(UpdateMerchantBranchResponseModel $model, \Throwable $e): IViewModel
    {
        if (config('app.debug')) {
            // rethrow and let Laravel display the error
            throw $e;
        }

        Flash::error(trans("messages.error_updating", ['operator' => trans("messages.attributes.Merchant_branch") . " {$model->getMerchantBranch()->getName()}"]));

        return new HttpResponseIViewModel(
            app('redirect')
                ->route(request()->get('guard').'.merchantBranches.index')
        );
    }

    public function unableToFindMerchantBranch(): IViewModel
    {

        Flash::error(trans("messages.not_found", ['operator' => trans("messages.attributes.merchant_branch")]));

        return new HttpResponseIViewModel(
            app('redirect')
                ->route(request()->get('guard') . '.merchantBranches.index')
        );
    }
}
