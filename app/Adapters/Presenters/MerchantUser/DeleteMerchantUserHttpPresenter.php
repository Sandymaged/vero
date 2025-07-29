<?php

namespace App\Adapters\Presenters\MerchantUser;

use App\Adapters\Presenters\HttpPresenter;
use App\Adapters\ViewModels\HttpResponseIViewModel;
use App\Domain\Interfaces\IViewModel;
use App\Domain\UseCases\MerchantUser\DeleteMerchantUser\DeleteMerchantUserResponseModel;
use App\Domain\UseCases\MerchantUser\DeleteMerchantUser\IDeleteMerchantUserOutputPort;

class DeleteMerchantUserHttpPresenter extends HttpPresenter implements IDeleteMerchantUserOutputPort
{
    public function merchantUserDeleted(DeleteMerchantUserResponseModel $model): IViewModel
    {
        return new HttpResponseIViewModel(
            response()->json(['messages' => __('messages.deleted_successfully', ['operator' => __('messages.attributes.merchantUser')])])
        );
    }


    public function unableToDeleteMerchantUser(\Throwable $e): IViewModel
    {
        if (config('app.debug')) {
            // rethrow and let Laravel display the error
            throw $e;
        }

        return new HttpResponseIViewModel(
            response()->json(['messages' => trans("messages.error_deleting", ['operator' => trans("messages.attributes.merchantUser")])], 500)
        );
    }

    public function unableToFindMerchantUser(): IViewModel
    {

        return new HttpResponseIViewModel(
            response()->json(['messages' => trans("messages.not_found", ['operator' => trans("messages.attributes.merchantUser")])], 404)
        );
    }
}
