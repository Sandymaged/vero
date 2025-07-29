<?php

namespace App\Adapters\Presenters\MerchantBranch;

use App\Adapters\Presenters\HttpPresenter;
use App\Adapters\ViewModels\HttpResponseIViewModel;
use App\Domain\Interfaces\IViewModel;
use App\Domain\UseCases\MerchantBranch\DeleteMerchantBranch\DeleteMerchantBranchResponseModel;
use App\Domain\UseCases\MerchantBranch\DeleteMerchantBranch\IDeleteMerchantBranchOutputPort;

class DeleteMerchantBranchHttpPresenter extends HttpPresenter implements IDeleteMerchantBranchOutputPort
{
    public function merchantBranchDeleted(DeleteMerchantBranchResponseModel $model): IViewModel
    {
        return new HttpResponseIViewModel(
            response()->json(['messages' => __('messages.deleted_successfully', ['operator' => __('messages.attributes.merchantBranch')])])
        );
    }


    public function unableToDeleteMerchantBranch(\Throwable $e): IViewModel
    {
        if (config('app.debug')) {
            // rethrow and let Laravel display the error
            throw $e;
        }

        return new HttpResponseIViewModel(
            response()->json(['messages' => trans("messages.error_deleting", ['operator' => trans("messages.attributes.merchantBranch")])], 500)
        );
    }

    public function unableToFindMerchantBranch(): IViewModel
    {

        return new HttpResponseIViewModel(
            response()->json(['messages' => trans("messages.not_found", ['operator' => trans("messages.attributes.merchantBranch")])], 404)
        );
    }
}
