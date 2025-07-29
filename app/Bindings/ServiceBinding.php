<?php

namespace App\Bindings;

use App\Adapters\Presenters\Service\DeleteServiceHttpPresenter;
use App\Adapters\Presenters\Service\DeleteAllServiceHttpPresenter;
use App\Adapters\Presenters\Service\EditServiceHttpPresenter;
use App\Adapters\Presenters\Service\UpdateServiceHttpPresenter;
use App\Adapters\Presenters\Service\CreateServiceHttpPresenter;
use App\Adapters\Presenters\Service\ListServiceHttpPresenter;
use App\Adapters\Presenters\Service\StoreServiceHttpPresenter;
use App\Domain\Interfaces\Factories\IServiceFactory;
use App\Domain\Interfaces\Repositories\IServiceRepository;
use App\Domain\UseCases\Service\DeleteService\DeleteServiceInteractor;
use App\Domain\UseCases\Service\DeleteService\IDeleteServiceInputPort;
use App\Domain\UseCases\Service\DeleteAllService\DeleteAllServiceInteractor;
use App\Domain\UseCases\Service\DeleteAllService\IDeleteAllServiceInputPort;
use App\Domain\UseCases\Service\EditService\EditServiceInteractor;
use App\Domain\UseCases\Service\EditService\IEditServiceInputPort;
use App\Domain\UseCases\Service\UpdateService\IUpdateServiceInputPort;
use App\Domain\UseCases\Service\UpdateService\UpdateServiceInteractor;
use App\Domain\UseCases\Service\CreateService\CreateServiceInteractor;
use App\Domain\UseCases\Service\CreateService\ICreateServiceInputPort;
use App\Domain\UseCases\Service\ListService\IListServiceInputPort;
use App\Domain\UseCases\Service\ListService\ListServiceInteractor;
use App\Domain\UseCases\Service\StoreService\IStoreServiceInputPort;
use App\Domain\UseCases\Service\StoreService\StoreServiceInteractor;
use App\Factories\ServiceModelFactory;
use App\Http\Controllers\Backend\Service\DeleteServiceController;
use App\Http\Controllers\Backend\Service\DeleteAllServiceController;
use App\Http\Controllers\Backend\Service\EditServiceController;
use App\Http\Controllers\Backend\Service\UpdateServiceController;
use App\Http\Controllers\Backend\Service\CreateServiceController;
use App\Http\Controllers\Backend\Service\ListServiceController;
use App\Http\Controllers\Backend\Service\StoreServiceController;
use App\Repositories\ServiceRepository;

final class ServiceBinding
{

    public static function bind()
    {
        // Factory
        app()->bind(
            IServiceFactory::class,
            ServiceModelFactory::class,
        );

        // Repository
        app()->bind(
            IServiceRepository::class,
            ServiceRepository::class,
        );

        // UseCases
        app()
            ->when(StoreServiceController::class)
            ->needs(IStoreServiceInputPort::class)
            ->give(function ($app) {
                return $app->make(StoreServiceInteractor::class, [
                    'output' => $app->make(StoreServiceHttpPresenter::class),
                ]);
            });
        app()
            ->when(CreateServiceController::class)
            ->needs(ICreateServiceInputPort::class)
            ->give(function ($app) {
                return $app->make(CreateServiceInteractor::class, [
                    'output' => $app->make(CreateServiceHttpPresenter::class),
                ]);
            });
        app()
            ->when(ListServiceController::class)
            ->needs(IListServiceInputPort::class)
            ->give(function ($app) {
                return $app->make(ListServiceInteractor::class, [
                    'output' => $app->make(ListServiceHttpPresenter::class),
                ]);
            });
        app()
            ->when(EditServiceController::class)
            ->needs(IEditServiceInputPort::class)
            ->give(function ($app) {
                return $app->make(EditServiceInteractor::class, [
                    'output' => $app->make(EditServiceHttpPresenter::class),
                ]);
            });
        app()
            ->when(UpdateServiceController::class)
            ->needs(IUpdateServiceInputPort::class)
            ->give(function ($app) {
                return $app->make(UpdateServiceInteractor::class, [
                    'output' => $app->make(UpdateServiceHttpPresenter::class),
                ]);
            });
        app()
            ->when(DeleteServiceController::class)
            ->needs(IDeleteServiceInputPort::class)
            ->give(function ($app) {
                return $app->make(DeleteServiceInteractor::class, [
                    'output' => $app->make(DeleteServiceHttpPresenter::class),
                ]);
            });
        app()
            ->when(DeleteAllServiceController::class)
            ->needs(IDeleteAllServiceInputPort::class)
            ->give(function ($app) {
                return $app->make(DeleteAllServiceInteractor::class, [
                    'output' => $app->make(DeleteAllServiceHttpPresenter::class),
                ]);
            });
    }
}
