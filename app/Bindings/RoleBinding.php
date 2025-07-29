<?php

namespace App\Bindings;

use App\Adapters\Presenters\Role\DeleteRoleHttpPresenter;
use App\Adapters\Presenters\Role\DeleteAllRoleHttpPresenter;
use App\Adapters\Presenters\Role\EditRoleHttpPresenter;
use App\Adapters\Presenters\Role\UpdateRoleHttpPresenter;
use App\Adapters\Presenters\Role\CreateRoleHttpPresenter;
use App\Adapters\Presenters\Role\StoreRoleHttpPresenter;
use App\Adapters\Presenters\Role\ListRoleHttpPresenter;
use App\Domain\Interfaces\Factories\IRoleFactory;
use App\Domain\Interfaces\Repositories\IRoleRepository;
use App\Domain\UseCases\Role\DeleteRole\DeleteRoleInteractor;
use App\Domain\UseCases\Role\DeleteRole\IDeleteRoleInputPort;
use App\Domain\UseCases\Role\DeleteAllRole\DeleteAllRoleInteractor;
use App\Domain\UseCases\Role\DeleteAllRole\IDeleteAllRoleInputPort;
use App\Domain\UseCases\Role\EditRole\EditRoleInteractor;
use App\Domain\UseCases\Role\EditRole\IEditRoleInputPort;
use App\Domain\UseCases\Role\UpdateRole\IUpdateRoleInputPort;
use App\Domain\UseCases\Role\UpdateRole\UpdateRoleInteractor;
use App\Domain\UseCases\Role\CreateRole\CreateRoleInteractor;
use App\Domain\UseCases\Role\CreateRole\ICreateRoleInputPort;
use App\Domain\UseCases\Role\ListRole\IListRoleInputPort;
use App\Domain\UseCases\Role\ListRole\ListRoleInteractor;
use App\Domain\UseCases\Role\StoreRole\IStoreRoleInputPort;
use App\Domain\UseCases\Role\StoreRole\StoreRoleInteractor;
use App\Factories\RoleModelFactory;
use App\Http\Controllers\Backend\Role\DeleteRoleController;
use App\Http\Controllers\Backend\Role\DeleteAllRoleController;
use App\Http\Controllers\Backend\Role\EditRoleController;
use App\Http\Controllers\Backend\Role\UpdateRoleController;
use App\Http\Controllers\Backend\Role\CreateRoleController;
use App\Http\Controllers\Backend\Role\StoreRoleController;
use App\Http\Controllers\Backend\Role\ListRoleController;
use App\Repositories\RoleRepository;

final class RoleBinding
{

    public static function bind()
    {
        // Factory
        app()->bind(
            IRoleFactory::class,
            RoleModelFactory::class,
        );

        // Repository
        app()->bind(
            IRoleRepository::class,
            RoleRepository::class,
        );

        // UseCases
        app()
            ->when(StoreRoleController::class)
            ->needs(IStoreRoleInputPort::class)
            ->give(function ($app) {
                return $app->make(StoreRoleInteractor::class, [
                    'output' => $app->make(StoreRoleHttpPresenter::class),
                ]);
            });
        app()
            ->when(CreateRoleController::class)
            ->needs(ICreateRoleInputPort::class)
            ->give(function ($app) {
                return $app->make(CreateRoleInteractor::class, [
                    'output' => $app->make(CreateRoleHttpPresenter::class),
                ]);
            });
        app()
            ->when(ListRoleController::class)
            ->needs(IListRoleInputPort::class)
            ->give(function ($app) {
                return $app->make(ListRoleInteractor::class, [
                    'output' => $app->make(ListRoleHttpPresenter::class),
                ]);
            });
        app()
            ->when(EditRoleController::class)
            ->needs(IEditRoleInputPort::class)
            ->give(function ($app) {
                return $app->make(EditRoleInteractor::class, [
                    'output' => $app->make(EditRoleHttpPresenter::class),
                ]);
            });
        app()
            ->when(UpdateRoleController::class)
            ->needs(IUpdateRoleInputPort::class)
            ->give(function ($app) {
                return $app->make(UpdateRoleInteractor::class, [
                    'output' => $app->make(UpdateRoleHttpPresenter::class),
                ]);
            });
        app()
            ->when(DeleteRoleController::class)
            ->needs(IDeleteRoleInputPort::class)
            ->give(function ($app) {
                return $app->make(DeleteRoleInteractor::class, [
                    'output' => $app->make(DeleteRoleHttpPresenter::class),
                ]);
            });
        app()
            ->when(DeleteAllRoleController::class)
            ->needs(IDeleteAllRoleInputPort::class)
            ->give(function ($app) {
                return $app->make(DeleteAllRoleInteractor::class, [
                    'output' => $app->make(DeleteAllRoleHttpPresenter::class),
                ]);
            });
    }
}
