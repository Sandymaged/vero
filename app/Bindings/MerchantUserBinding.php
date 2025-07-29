<?php

namespace App\Bindings;

use App\Adapters\Presenters\MerchantUser\DeleteMerchantUserHttpPresenter;
use App\Adapters\Presenters\MerchantUser\DeleteAllMerchantUserHttpPresenter;
use App\Adapters\Presenters\MerchantUser\EditMerchantUserHttpPresenter;
use App\Adapters\Presenters\MerchantUser\UpdateMerchantUserHttpPresenter;
use App\Adapters\Presenters\MerchantUser\CreateMerchantUserHttpPresenter;
use App\Adapters\Presenters\MerchantUser\StoreMerchantUserHttpPresenter;
use App\Adapters\Presenters\MerchantUser\ListMerchantUserHttpPresenter;
use App\Domain\Interfaces\Factories\IMerchantUserFactory;
use App\Domain\Interfaces\Repositories\IMerchantUserRepository;
use App\Domain\UseCases\MerchantUser\DeleteMerchantUser\DeleteMerchantUserInteractor;
use App\Domain\UseCases\MerchantUser\DeleteMerchantUser\IDeleteMerchantUserInputPort;
use App\Domain\UseCases\MerchantUser\DeleteAllMerchantUser\DeleteAllMerchantUserInteractor;
use App\Domain\UseCases\MerchantUser\DeleteAllMerchantUser\IDeleteAllMerchantUserInputPort;
use App\Domain\UseCases\MerchantUser\EditMerchantUser\EditMerchantUserInteractor;
use App\Domain\UseCases\MerchantUser\EditMerchantUser\IEditMerchantUserInputPort;
use App\Domain\UseCases\MerchantUser\UpdateMerchantUser\IUpdateMerchantUserInputPort;
use App\Domain\UseCases\MerchantUser\UpdateMerchantUser\UpdateMerchantUserInteractor;
use App\Domain\UseCases\MerchantUser\CreateMerchantUser\CreateMerchantUserInteractor;
use App\Domain\UseCases\MerchantUser\CreateMerchantUser\ICreateMerchantUserInputPort;
use App\Domain\UseCases\MerchantUser\ListMerchantUser\IListMerchantUserInputPort;
use App\Domain\UseCases\MerchantUser\ListMerchantUser\ListMerchantUserInteractor;
use App\Domain\UseCases\MerchantUser\StoreMerchantUser\IStoreMerchantUserInputPort;
use App\Domain\UseCases\MerchantUser\StoreMerchantUser\StoreMerchantUserInteractor;
use App\Factories\MerchantUserModelFactory;
use App\Http\Controllers\Backend\MerchantUser\DeleteMerchantUserController;
use App\Http\Controllers\Backend\MerchantUser\DeleteAllMerchantUserController;
use App\Http\Controllers\Backend\MerchantUser\EditMerchantUserController;
use App\Http\Controllers\Backend\MerchantUser\UpdateMerchantUserController;
use App\Http\Controllers\Backend\MerchantUser\CreateMerchantUserController;
use App\Http\Controllers\Backend\MerchantUser\StoreMerchantUserController;
use App\Http\Controllers\Backend\MerchantUser\ListMerchantUserController;
use App\Repositories\MerchantUserRepository;

final class MerchantUserBinding
{

    public static function bind()
    {
        // Factory
        app()->bind(
            IMerchantUserFactory::class,
            MerchantUserModelFactory::class,
        );

        // Repository
        app()->bind(
            IMerchantUserRepository::class,
            MerchantUserRepository::class,
        );

        // UseCases
        app()
            ->when(StoreMerchantUserController::class)
            ->needs(IStoreMerchantUserInputPort::class)
            ->give(function ($app) {
                return $app->make(StoreMerchantUserInteractor::class, [
                    'output' => $app->make(StoreMerchantUserHttpPresenter::class),
                ]);
            });
        app()
            ->when(CreateMerchantUserController::class)
            ->needs(ICreateMerchantUserInputPort::class)
            ->give(function ($app) {
                return $app->make(CreateMerchantUserInteractor::class, [
                    'output' => $app->make(CreateMerchantUserHttpPresenter::class),
                ]);
            });
        app()
            ->when(ListMerchantUserController::class)
            ->needs(IListMerchantUserInputPort::class)
            ->give(function ($app) {
                return $app->make(ListMerchantUserInteractor::class, [
                    'output' => $app->make(ListMerchantUserHttpPresenter::class),
                ]);
            });
        app()
            ->when(EditMerchantUserController::class)
            ->needs(IEditMerchantUserInputPort::class)
            ->give(function ($app) {
                return $app->make(EditMerchantUserInteractor::class, [
                    'output' => $app->make(EditMerchantUserHttpPresenter::class),
                ]);
            });
        app()
            ->when(UpdateMerchantUserController::class)
            ->needs(IUpdateMerchantUserInputPort::class)
            ->give(function ($app) {
                return $app->make(UpdateMerchantUserInteractor::class, [
                    'output' => $app->make(UpdateMerchantUserHttpPresenter::class),
                ]);
            });
        app()
            ->when(DeleteMerchantUserController::class)
            ->needs(IDeleteMerchantUserInputPort::class)
            ->give(function ($app) {
                return $app->make(DeleteMerchantUserInteractor::class, [
                    'output' => $app->make(DeleteMerchantUserHttpPresenter::class),
                ]);
            });
        app()
            ->when(DeleteAllMerchantUserController::class)
            ->needs(IDeleteAllMerchantUserInputPort::class)
            ->give(function ($app) {
                return $app->make(DeleteAllMerchantUserInteractor::class, [
                    'output' => $app->make(DeleteAllMerchantUserHttpPresenter::class),
                ]);
            });
    }
}
