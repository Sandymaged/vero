<?php

namespace App\Adapters\Presenters\Permission;

use App\Adapters\Presenters\HttpPresenter;
use App\Adapters\ViewModels\HttpResponseIViewModel;
use App\Domain\Interfaces\IViewModel;
use App\Domain\UseCases\Permission\DeleteAllPermission\IDeleteAllPermissionOutputPort;

class DeleteAllPermissionHttpPresenter extends HttpPresenter implements IDeleteAllPermissionOutputPort
{
    public function permissionsDeleted(): IViewModel
    {
        return new HttpResponseIViewModel(
            response()->json(['messages' => __('messages.deleted_successfully', ['operator' => __('messages.attributes.permissions')])])
        );
    }


    public function unableToDeleteAllPermission(\Throwable $e): IViewModel
    {
        if (config('app.debug')) {
            // rethrow and let Laravel display the error
            throw $e;
        }

        return new HttpResponseIViewModel(
            response()->json(['messages' => trans("messages.error_deleting", ['operator' => trans("messages.attributes.permissions")])], 500)
        );
    }
}
