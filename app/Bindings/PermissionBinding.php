<?php

namespace App\Bindings;

use App\Adapters\Presenters\Permission\DeletePermissionHttpPresenter;
use App\Adapters\Presenters\Permission\DeleteAllPermissionHttpPresenter;
use App\Adapters\Presenters\Permission\EditPermissionHttpPresenter;
use App\Adapters\Presenters\Permission\UpdatePermissionHttpPresenter;
use App\Adapters\Presenters\Permission\CreatePermissionHttpPresenter;
use App\Adapters\Presenters\Permission\StorePermissionHttpPresenter;
use App\Adapters\Presenters\Permission\ListPermissionHttpPresenter;
use App\Domain\Interfaces\Factories\IPermissionFactory;
use App\Domain\Interfaces\Repositories\IPermissionRepository;
use App\Domain\UseCases\Permission\DeletePermission\DeletePermissionInteractor;
use App\Domain\UseCases\Permission\DeletePermission\IDeletePermissionInputPort;
use App\Domain\UseCases\Permission\DeleteAllPermission\DeleteAllPermissionInteractor;
use App\Domain\UseCases\Permission\DeleteAllPermission\IDeleteAllPermissionInputPort;
use App\Domain\UseCases\Permission\EditPermission\EditPermissionInteractor;
use App\Domain\UseCases\Permission\EditPermission\IEditPermissionInputPort;
use App\Domain\UseCases\Permission\UpdatePermission\IUpdatePermissionInputPort;
use App\Domain\UseCases\Permission\UpdatePermission\UpdatePermissionInteractor;
use App\Domain\UseCases\Permission\CreatePermission\CreatePermissionInteractor;
use App\Domain\UseCases\Permission\CreatePermission\ICreatePermissionInputPort;
use App\Domain\UseCases\Permission\ListPermission\IListPermissionInputPort;
use App\Domain\UseCases\Permission\ListPermission\ListPermissionInteractor;
use App\Domain\UseCases\Permission\StorePermission\IStorePermissionInputPort;
use App\Domain\UseCases\Permission\StorePermission\StorePermissionInteractor;
use App\Factories\PermissionModelFactory;
use App\Http\Controllers\Backend\Permission\DeletePermissionController;
use App\Http\Controllers\Backend\Permission\DeleteAllPermissionController;
use App\Http\Controllers\Backend\Permission\EditPermissionController;
use App\Http\Controllers\Backend\Permission\UpdatePermissionController;
use App\Http\Controllers\Backend\Permission\CreatePermissionController;
use App\Http\Controllers\Backend\Permission\StorePermissionController;
use App\Http\Controllers\Backend\Permission\ListPermissionController;
use App\Repositories\PermissionRepository;

final class PermissionBinding
{

    public static function bind()
    {
        // Factory
        app()->bind(
            IPermissionFactory::class,
            PermissionModelFactory::class,
        );

        // Repository
        app()->bind(
            IPermissionRepository::class,
            PermissionRepository::class,
        );

        // UseCases
        app()
            ->when(StorePermissionController::class)
            ->needs(IStorePermissionInputPort::class)
            ->give(function ($app) {
                return $app->make(StorePermissionInteractor::class, [
                    'output' => $app->make(StorePermissionHttpPresenter::class),
                ]);
            });
        app()
            ->when(CreatePermissionController::class)
            ->needs(ICreatePermissionInputPort::class)
            ->give(function ($app) {
                return $app->make(CreatePermissionInteractor::class, [
                    'output' => $app->make(CreatePermissionHttpPresenter::class),
                ]);
            });
        app()
            ->when(ListPermissionController::class)
            ->needs(IListPermissionInputPort::class)
            ->give(function ($app) {
                return $app->make(ListPermissionInteractor::class, [
                    'output' => $app->make(ListPermissionHttpPresenter::class),
                ]);
            });
        app()
            ->when(EditPermissionController::class)
            ->needs(IEditPermissionInputPort::class)
            ->give(function ($app) {
                return $app->make(EditPermissionInteractor::class, [
                    'output' => $app->make(EditPermissionHttpPresenter::class),
                ]);
            });
        app()
            ->when(UpdatePermissionController::class)
            ->needs(IUpdatePermissionInputPort::class)
            ->give(function ($app) {
                return $app->make(UpdatePermissionInteractor::class, [
                    'output' => $app->make(UpdatePermissionHttpPresenter::class),
                ]);
            });
        app()
            ->when(DeletePermissionController::class)
            ->needs(IDeletePermissionInputPort::class)
            ->give(function ($app) {
                return $app->make(DeletePermissionInteractor::class, [
                    'output' => $app->make(DeletePermissionHttpPresenter::class),
                ]);
            });
        app()
            ->when(DeleteAllPermissionController::class)
            ->needs(IDeleteAllPermissionInputPort::class)
            ->give(function ($app) {
                return $app->make(DeleteAllPermissionInteractor::class, [
                    'output' => $app->make(DeleteAllPermissionHttpPresenter::class),
                ]);
            });
    }
}
