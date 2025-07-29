<?php

namespace App\Adapters\Presenters\Merchant;

use App\Adapters\Presenters\HttpPresenter;
use App\Adapters\ViewModels\HttpResponseIViewModel;
use App\Domain\Interfaces\IViewModel;
use App\Domain\UseCases\Merchant\DeleteAllMerchant\IDeleteAllMerchantOutputPort;

class DeleteAllMerchantHttpPresenter extends HttpPresenter implements IDeleteAllMerchantOutputPort
{
    public function merchantsDeleted(): IViewModel
    {
        return new HttpResponseIViewModel(
            response()->json(['messages' => __('messages.deleted_successfully', ['operator' => __('messages.attributes.merchants')])])
        );
    }


    public function unableToDeleteAllMerchant(\Throwable $e): IViewModel
    {
        if (config('app.debug')) {
            // rethrow and let Laravel display the error
            throw $e;
        }

        return new HttpResponseIViewModel(
            response()->json(['messages' => trans("messages.error_deleting", ['operator' => trans("messages.attributes.merchants")])], 500)
        );
    }
}
