<?php

namespace App\Adapters\Presenters\Permission;

use App\Adapters\Presenters\HttpPresenter;
use App\Adapters\ViewModels\HttpResponseIViewModel;
use App\Domain\Interfaces\IViewModel;
use App\Domain\UseCases\Permission\DeletePermission\DeletePermissionResponseModel;
use App\Domain\UseCases\Permission\DeletePermission\IDeletePermissionOutputPort;

class DeletePermissionHttpPresenter extends HttpPresenter implements IDeletePermissionOutputPort
{
    public function permissionDeleted(DeletePermissionResponseModel $model): IViewModel
    {
        return new HttpResponseIViewModel(
            response()->json(['messages' => __('messages.deleted_successfully', ['operator' => __('messages.attributes.permission')])])
        );
    }


    public function unableToDeletePermission(\Throwable $e): IViewModel
    {
        if (config('app.debug')) {
            // rethrow and let Laravel display the error
            throw $e;
        }

        return new HttpResponseIViewModel(
            response()->json(['messages' => trans("messages.error_deleting", ['operator' => trans("messages.attributes.permission")])], 500)
        );
    }

    public function unableToFindPermission(): IViewModel
    {

        return new HttpResponseIViewModel(
            response()->json(['messages' => trans("messages.not_found", ['operator' => trans("messages.attributes.permission")])], 404)
        );
    }
}
