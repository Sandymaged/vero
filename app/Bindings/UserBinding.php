<?php

namespace App\Bindings;

use App\Adapters\Presenters\StoreUserCliPresenter;
use App\Adapters\Presenters\StoreUserHttpPresenter;
use App\Console\Commands\StoreUserCommand;
use App\Domain\Interfaces\Factories\IUserFactory;
use App\Domain\Interfaces\Repositories\IUserRepository;
use App\Domain\UseCases\StoreUser\StoreUserInteractor;
use App\Domain\UseCases\StoreUser\IStoreUserInputPort;
use App\Factories\UserModelFactory;
use App\Http\Controllers\StoreUserController;
use App\Repositories\UserDatabaseRepository;

final class UserBinding
{

    public static function bind()
    {
        // Factory
        app()->bind(
            IUserFactory::class,
            UserModelFactory::class,
        );

        // Repository
        app()->bind(
            IUserRepository::class,
            UserDatabaseRepository::class,
        );

        // UseCases
        app()->app
            ->when(StoreUserController::class)
            ->needs(IStoreUserInputPort::class)
            ->give(function ($app) {
                return $app->make(StoreUserInteractor::class, [
                    'output' => $app->make(StoreUserHttpPresenter::class),
                ]);
            });

        app()->app
            ->when(StoreUserCommand::class)
            ->needs(IStoreUserInputPort::class)
            ->give(function ($app) {
                return $app->make(StoreUserInteractor::class, [
                    'output' => $app->make(StoreUserCliPresenter::class),
                ]);
            });
    }
}
