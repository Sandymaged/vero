<?php

namespace App\Adapters\Presenters\Admin;

use App\Adapters\Presenters\HttpPresenter;
use App\Adapters\ViewModels\HttpResponseIViewModel;
use App\Domain\Interfaces\IViewModel;
use App\Domain\UseCases\Admin\DeleteAdmin\DeleteAdminResponseModel;
use App\Domain\UseCases\Admin\DeleteAdmin\IDeleteAdminOutputPort;

class DeleteAdminHttpPresenter extends HttpPresenter implements IDeleteAdminOutputPort
{
    public function adminDeleted(DeleteAdminResponseModel $model): IViewModel
    {
        return new HttpResponseIViewModel(
            response()->json(['messages' => __('messages.deleted_successfully', ['operator' => __('messages.attributes.admin')])])
        );
    }


    public function unableToDeleteAdmin(\Throwable $e): IViewModel
    {
        if (config('app.debug')) {
            // rethrow and let Laravel display the error
            throw $e;
        }

        return new HttpResponseIViewModel(
            response()->json(['messages' => trans("messages.error_deleting", ['operator' => trans("messages.attributes.admin")])], 500)
        );
    }

    public function unableToFindAdmin(): IViewModel
    {

        return new HttpResponseIViewModel(
            response()->json(['messages' => trans("messages.not_found", ['operator' => trans("messages.attributes.admin")])], 404)
        );
    }
}
