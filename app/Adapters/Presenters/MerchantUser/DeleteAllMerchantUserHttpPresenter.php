<?php

namespace App\Adapters\Presenters\MerchantUser;

use App\Adapters\Presenters\HttpPresenter;
use App\Adapters\ViewModels\HttpResponseIViewModel;
use App\Domain\Interfaces\IViewModel;
use App\Domain\UseCases\MerchantUser\DeleteAllMerchantUser\IDeleteAllMerchantUserOutputPort;

class DeleteAllMerchantUserHttpPresenter extends HttpPresenter implements IDeleteAllMerchantUserOutputPort
{
    public function merchantUsersDeleted(): IViewModel
    {
        return new HttpResponseIViewModel(
            response()->json(['messages' => __('messages.deleted_successfully', ['operator' => __('messages.attributes.merchant_users')])])
        );
    }


    public function unableToDeleteAllMerchantUser(\Throwable $e): IViewModel
    {
        if (config('app.debug')) {
            // rethrow and let Laravel display the error
            throw $e;
        }

        return new HttpResponseIViewModel(
            response()->json(['messages' => trans("messages.error_deleting", ['operator' => trans("messages.attributes.merchant_users")])], 500)
        );
    }
}
