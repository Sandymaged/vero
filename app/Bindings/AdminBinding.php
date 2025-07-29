<?php

namespace App\Bindings;

use App\Adapters\Presenters\Admin\CreateAdminHttpPresenter;
use App\Adapters\Presenters\Admin\DeleteAdminHttpPresenter;
use App\Adapters\Presenters\Admin\DeleteAllAdminHttpPresenter;
use App\Adapters\Presenters\Admin\EditAdminHttpPresenter;
use App\Adapters\Presenters\Admin\ListAdminHttpPresenter;
use App\Adapters\Presenters\Admin\PaginateAdminHttpPresenter;
use App\Adapters\Presenters\Admin\StoreAdminHttpPresenter;
use App\Adapters\Presenters\Admin\UpdateAdminHttpPresenter;
use App\Domain\Interfaces\Factories\IAdminFactory;
use App\Domain\Interfaces\Repositories\IAdminRepository;
use App\Domain\UseCases\Admin\CreateAdmin\CreateAdminInteractor;
use App\Domain\UseCases\Admin\CreateAdmin\ICreateAdminInputPort;
use App\Domain\UseCases\Admin\DeleteAdmin\DeleteAdminInteractor;
use App\Domain\UseCases\Admin\DeleteAdmin\IDeleteAdminInputPort;
use App\Domain\UseCases\Admin\DeleteAllAdmin\DeleteAllAdminInteractor;
use App\Domain\UseCases\Admin\DeleteAllAdmin\IDeleteAllAdminInputPort;
use App\Domain\UseCases\Admin\EditAdmin\EditAdminInteractor;
use App\Domain\UseCases\Admin\EditAdmin\IEditAdminInputPort;
use App\Domain\UseCases\Admin\ListAdmin\IListAdminInputPort;
use App\Domain\UseCases\Admin\ListAdmin\ListAdminInteractor;
use App\Domain\UseCases\Admin\PaginateAdmin\IPaginateAdminInputPort;
use App\Domain\UseCases\Admin\PaginateAdmin\PaginateAdminInteractor;
use App\Domain\UseCases\Admin\StoreAdmin\IStoreAdminInputPort;
use App\Domain\UseCases\Admin\StoreAdmin\StoreAdminInteractor;
use App\Domain\UseCases\Admin\UpdateAdmin\IUpdateAdminInputPort;
use App\Domain\UseCases\Admin\UpdateAdmin\UpdateAdminInteractor;
use App\Factories\AdminModelFactory;
use App\Http\Controllers\Backend\Admin\CreateAdminController;
use App\Http\Controllers\Backend\Admin\DeleteAdminController;
use App\Http\Controllers\Backend\Admin\DeleteAllAdminController;
use App\Http\Controllers\Backend\Admin\EditAdminController;
use App\Http\Controllers\Backend\Admin\ListAdminController;
use App\Http\Controllers\Backend\Admin\PaginateAdminController;
use App\Http\Controllers\Backend\Admin\StoreAdminController;
use App\Http\Controllers\Backend\Admin\UpdateAdminController;
use App\Repositories\AdminRepository;

final class AdminBinding
{

    public static function bind()
    {
        // Factory
        app()->bind(
            IAdminFactory::class,
            AdminModelFactory::class,
        );

        // Repository
        app()->bind(
            IAdminRepository::class,
            AdminRepository::class,
        );

        // UseCases
        app()
            ->when(StoreAdminController::class)
            ->needs(IStoreAdminInputPort::class)
            ->give(function ($app) {
                return $app->make(StoreAdminInteractor::class, [
                    'output' => $app->make(StoreAdminHttpPresenter::class),
                ]);
            });
        app()
            ->when(CreateAdminController::class)
            ->needs(ICreateAdminInputPort::class)
            ->give(function ($app) {
                return $app->make(CreateAdminInteractor::class, [
                    'output' => $app->make(CreateAdminHttpPresenter::class),
                ]);
            });
        app()
            ->when(ListAdminController::class)
            ->needs(IListAdminInputPort::class)
            ->give(function ($app) {
                return $app->make(ListAdminInteractor::class, [
                    'output' => $app->make(ListAdminHttpPresenter::class),
                ]);
            });
        app()
            ->when(EditAdminController::class)
            ->needs(IEditAdminInputPort::class)
            ->give(function ($app) {
                return $app->make(EditAdminInteractor::class, [
                    'output' => $app->make(EditAdminHttpPresenter::class),
                ]);
            });
        app()
            ->when(UpdateAdminController::class)
            ->needs(IUpdateAdminInputPort::class)
            ->give(function ($app) {
                return $app->make(UpdateAdminInteractor::class, [
                    'output' => $app->make(UpdateAdminHttpPresenter::class),
                ]);
            });
        app()
            ->when(DeleteAdminController::class)
            ->needs(IDeleteAdminInputPort::class)
            ->give(function ($app) {
                return $app->make(DeleteAdminInteractor::class, [
                    'output' => $app->make(DeleteAdminHttpPresenter::class),
                ]);
            });
        app()
            ->when(DeleteAllAdminController::class)
            ->needs(IDeleteAllAdminInputPort::class)
            ->give(function ($app) {
                return $app->make(DeleteAllAdminInteractor::class, [
                    'output' => $app->make(DeleteAllAdminHttpPresenter::class),
                ]);
            });
        app()
            ->when(PaginateAdminController::class)
            ->needs(IPaginateAdminInputPort::class)
            ->give(function ($app) {
                return $app->make(PaginateAdminInteractor::class, [
                    'output' => $app->make(PaginateAdminHttpPresenter::class),
                ]);
            });
    }
}
