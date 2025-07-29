<?php

namespace App\Adapters\Presenters\Role;

use App\Adapters\Presenters\HttpPresenter;
use App\Adapters\ViewModels\HttpResponseIViewModel;
use App\Domain\Interfaces\IViewModel;
use App\Domain\UseCases\Role\DeleteRole\DeleteRoleResponseModel;
use App\Domain\UseCases\Role\DeleteRole\IDeleteRoleOutputPort;

class DeleteRoleHttpPresenter extends HttpPresenter implements IDeleteRoleOutputPort
{
    public function roleDeleted(DeleteRoleResponseModel $model): IViewModel
    {
        return new HttpResponseIViewModel(
            response()->json(['messages' => __('messages.deleted_successfully', ['operator' => __('messages.attributes.role')])])
        );
    }


    public function unableToDeleteRole(\Throwable $e): IViewModel
    {
        if (config('app.debug')) {
            // rethrow and let Laravel display the error
            throw $e;
        }

        return new HttpResponseIViewModel(
            response()->json(['messages' => trans("messages.error_deleting", ['operator' => trans("messages.attributes.role")])], 500)
        );
    }

    public function unableToFindRole(): IViewModel
    {

        return new HttpResponseIViewModel(
            response()->json(['messages' => trans("messages.not_found", ['operator' => trans("messages.attributes.role")])], 404)
        );
    }
}
