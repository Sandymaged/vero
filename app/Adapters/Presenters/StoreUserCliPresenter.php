<?php

namespace App\Adapters\Presenters;

use App\Adapters\ViewModels\CliIViewModel;
use App\Domain\Interfaces\IViewModel;
use App\Domain\UseCases\StoreUser\IStoreUserOutputPort;
use App\Domain\UseCases\StoreUser\StoreUserResponseModel;
use Illuminate\Console\Command;

class StoreUserCliPresenter extends HttpPresenter implements IStoreUserOutputPort
{
    public function userCreated(StoreUserResponseModel $model): IViewModel
    {
        return new CliIViewModel(function (Command $command) use ($model): int {
            $command->info("User {$model->getUser()->getName()} successfully created.");
            return Command::SUCCESS;
        });
    }

    public function userAlreadyExists(StoreUserResponseModel $model): IViewModel
    {
        return new CliIViewModel(function (Command $command) use ($model): int {
            $command->error("User {$model->getUser()->getEmail()} already exists!");
            return Command::FAILURE;
        });
    }

    public function unableToStoreUser(StoreUserResponseModel $model, \Throwable $e): IViewModel
    {
        return new CliIViewModel(function (Command $command) use ($e): int {
            $command->error("Error occurred while creating user: {$e->getMessage()}");
            return Command::FAILURE;
        });
    }
}
