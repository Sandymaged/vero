<?php

namespace App\Adapters\Presenters;

use App\Adapters\ViewModels\HttpResponseIViewModel;
use App\Adapters\ViewModels\HttpViewResponseViewModel;
use App\Domain\Interfaces\IViewModel;
use App\Domain\UseCases\StoreUser\IStoreUserOutputPort;
use App\Domain\UseCases\StoreUser\StoreUserResponseModel;

class StoreUserHttpPresenter extends HttpPresenter implements IStoreUserOutputPort
{
    public function userCreated(StoreUserResponseModel $model): IViewModel
    {
        return new HttpResponseIViewModel(
            app('view')
                ->make('user.show')
                ->with(['user' => $model->getUser()])
        );
    }

    public function userAlreadyExists(StoreUserResponseModel $model): IViewModel
    {
        return new HttpResponseIViewModel(
            app('redirect')
                ->route('user.create')
                ->withErrors(['create-user' => "User {$model->getUser()->getEmail()} alreay exists."])
        );
    }

    public function unableToStoreUser(StoreUserResponseModel $model, \Throwable $e): IViewModel
    {
        if (config('app.debug')) {
            // rethrow and let Laravel display the error
            throw $e;
        }

        return new HttpResponseIViewModel(
            app('redirect')
                ->route('user.create')
                ->withErrors(['create-user' => "Error occurred while creating user {$model->getUser()->getName()}"])
        );
    }
}
