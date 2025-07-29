<?php

namespace App\Domain\UseCases\StoreUser;

use App\Domain\Interfaces\IViewModel;

interface IStoreUserOutputPort
{
    public function userCreated(StoreUserResponseModel $model): IViewModel;

    public function userAlreadyExists(StoreUserResponseModel $model): IViewModel;

    public function unableToStoreUser(StoreUserResponseModel $model, \Throwable $e): IViewModel;
}
