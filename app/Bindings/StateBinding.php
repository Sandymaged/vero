<?php

namespace App\Bindings;

use App\Adapters\Presenters\State\DeleteStateHttpPresenter;
use App\Adapters\Presenters\State\DeleteAllStateHttpPresenter;
use App\Adapters\Presenters\State\EditStateHttpPresenter;
use App\Adapters\Presenters\State\UpdateStateHttpPresenter;
use App\Adapters\Presenters\State\CreateStateHttpPresenter;
use App\Adapters\Presenters\State\ListStateHttpPresenter;
use App\Adapters\Presenters\State\StoreStateHttpPresenter;
use App\Domain\Interfaces\Factories\IStateFactory;
use App\Domain\Interfaces\Repositories\IStateRepository;
use App\Domain\UseCases\State\DeleteState\DeleteStateInteractor;
use App\Domain\UseCases\State\DeleteState\IDeleteStateInputPort;
use App\Domain\UseCases\State\DeleteAllState\DeleteAllStateInteractor;
use App\Domain\UseCases\State\DeleteAllState\IDeleteAllStateInputPort;
use App\Domain\UseCases\State\EditState\EditStateInteractor;
use App\Domain\UseCases\State\EditState\IEditStateInputPort;
use App\Domain\UseCases\State\UpdateState\IUpdateStateInputPort;
use App\Domain\UseCases\State\UpdateState\UpdateStateInteractor;
use App\Domain\UseCases\State\CreateState\CreateStateInteractor;
use App\Domain\UseCases\State\CreateState\ICreateStateInputPort;
use App\Domain\UseCases\State\ListState\IListStateInputPort;
use App\Domain\UseCases\State\ListState\ListStateInteractor;
use App\Domain\UseCases\State\StoreState\IStoreStateInputPort;
use App\Domain\UseCases\State\StoreState\StoreStateInteractor;
use App\Factories\StateModelFactory;
use App\Http\Controllers\Backend\State\DeleteStateController;
use App\Http\Controllers\Backend\State\DeleteAllStateController;
use App\Http\Controllers\Backend\State\EditStateController;
use App\Http\Controllers\Backend\State\UpdateStateController;
use App\Http\Controllers\Backend\State\CreateStateController;
use App\Http\Controllers\Backend\State\ListStateController;
use App\Http\Controllers\Backend\State\StoreStateController;
use App\Repositories\StateRepository;

final class StateBinding
{

    public static function bind()
    {
        // Factory
        app()->bind(
            IStateFactory::class,
            StateModelFactory::class,
        );

        // Repository
        app()->bind(
            IStateRepository::class,
            StateRepository::class,
        );

        // UseCases
        app()
            ->when(StoreStateController::class)
            ->needs(IStoreStateInputPort::class)
            ->give(function ($app) {
                return $app->make(StoreStateInteractor::class, [
                    'output' => $app->make(StoreStateHttpPresenter::class),
                ]);
            });
        app()
            ->when(CreateStateController::class)
            ->needs(ICreateStateInputPort::class)
            ->give(function ($app) {
                return $app->make(CreateStateInteractor::class, [
                    'output' => $app->make(CreateStateHttpPresenter::class),
                ]);
            });
        app()
            ->when(ListStateController::class)
            ->needs(IListStateInputPort::class)
            ->give(function ($app) {
                return $app->make(ListStateInteractor::class, [
                    'output' => $app->make(ListStateHttpPresenter::class),
                ]);
            });
        app()
            ->when(EditStateController::class)
            ->needs(IEditStateInputPort::class)
            ->give(function ($app) {
                return $app->make(EditStateInteractor::class, [
                    'output' => $app->make(EditStateHttpPresenter::class),
                ]);
            });
        app()
            ->when(UpdateStateController::class)
            ->needs(IUpdateStateInputPort::class)
            ->give(function ($app) {
                return $app->make(UpdateStateInteractor::class, [
                    'output' => $app->make(UpdateStateHttpPresenter::class),
                ]);
            });
        app()
            ->when(DeleteStateController::class)
            ->needs(IDeleteStateInputPort::class)
            ->give(function ($app) {
                return $app->make(DeleteStateInteractor::class, [
                    'output' => $app->make(DeleteStateHttpPresenter::class),
                ]);
            });
        app()
            ->when(DeleteAllStateController::class)
            ->needs(IDeleteAllStateInputPort::class)
            ->give(function ($app) {
                return $app->make(DeleteAllStateInteractor::class, [
                    'output' => $app->make(DeleteAllStateHttpPresenter::class),
                ]);
            });
    }
}
