<?php

namespace App\Adapters\Presenters\MerchantBranch;

use App\Adapters\Presenters\HttpPresenter;
use App\Adapters\ViewModels\HttpResponseIViewModel;
use App\Domain\Interfaces\IViewModel;
use App\Domain\UseCases\MerchantBranch\DeleteAllMerchantBranch\IDeleteAllMerchantBranchOutputPort;

class DeleteAllMerchantBranchHttpPresenter extends HttpPresenter implements IDeleteAllMerchantBranchOutputPort
{
    public function merchant_branchesDeleted(): IViewModel
    {
        return new HttpResponseIViewModel(
            response()->json(['messages' => __('messages.deleted_successfully', ['operator' => __('messages.attributes.merchant_branches')])])
        );
    }


    public function unableToDeleteAllMerchantBranch(\Throwable $e): IViewModel
    {
        if (config('app.debug')) {
            // rethrow and let Laravel display the error
            throw $e;
        }

        return new HttpResponseIViewModel(
            response()->json(['messages' => trans("messages.error_deleting", ['operator' => trans("messages.attributes.merchant_branches")])], 500)
        );
    }
}
