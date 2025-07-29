<?php

namespace App\Bindings;

use App\Adapters\Presenters\City\DeleteCityHttpPresenter;
use App\Adapters\Presenters\City\DeleteAllCityHttpPresenter;
use App\Adapters\Presenters\City\EditCityHttpPresenter;
use App\Adapters\Presenters\City\UpdateCityHttpPresenter;
use App\Adapters\Presenters\City\CreateCityHttpPresenter;
use App\Adapters\Presenters\City\ListCityHttpPresenter;
use App\Adapters\Presenters\City\StoreCityHttpPresenter;
use App\Domain\Interfaces\Factories\ICityFactory;
use App\Domain\Interfaces\Repositories\ICityRepository;
use App\Domain\UseCases\City\DeleteCity\DeleteCityInteractor;
use App\Domain\UseCases\City\DeleteCity\IDeleteCityInputPort;
use App\Domain\UseCases\City\DeleteAllCity\DeleteAllCityInteractor;
use App\Domain\UseCases\City\DeleteAllCity\IDeleteAllCityInputPort;
use App\Domain\UseCases\City\EditCity\EditCityInteractor;
use App\Domain\UseCases\City\EditCity\IEditCityInputPort;
use App\Domain\UseCases\City\UpdateCity\IUpdateCityInputPort;
use App\Domain\UseCases\City\UpdateCity\UpdateCityInteractor;
use App\Domain\UseCases\City\CreateCity\CreateCityInteractor;
use App\Domain\UseCases\City\CreateCity\ICreateCityInputPort;
use App\Domain\UseCases\City\ListCity\IListCityInputPort;
use App\Domain\UseCases\City\ListCity\ListCityInteractor;
use App\Domain\UseCases\City\StoreCity\IStoreCityInputPort;
use App\Domain\UseCases\City\StoreCity\StoreCityInteractor;
use App\Factories\CityModelFactory;
use App\Http\Controllers\Backend\City\DeleteCityController;
use App\Http\Controllers\Backend\City\DeleteAllCityController;
use App\Http\Controllers\Backend\City\EditCityController;
use App\Http\Controllers\Backend\City\UpdateCityController;
use App\Http\Controllers\Backend\City\CreateCityController;
use App\Http\Controllers\Backend\City\ListCityController;
use App\Http\Controllers\Backend\City\StoreCityController;
use App\Repositories\CityRepository;

final class CityBinding
{

    public static function bind()
    {
        // Factory
        app()->bind(
            ICityFactory::class,
            CityModelFactory::class,
        );

        // Repository
        app()->bind(
            ICityRepository::class,
            CityRepository::class,
        );

        // UseCases
        app()
            ->when(StoreCityController::class)
            ->needs(IStoreCityInputPort::class)
            ->give(function ($app) {
                return $app->make(StoreCityInteractor::class, [
                    'output' => $app->make(StoreCityHttpPresenter::class),
                ]);
            });
        app()
            ->when(CreateCityController::class)
            ->needs(ICreateCityInputPort::class)
            ->give(function ($app) {
                return $app->make(CreateCityInteractor::class, [
                    'output' => $app->make(CreateCityHttpPresenter::class),
                ]);
            });
        app()
            ->when(ListCityController::class)
            ->needs(IListCityInputPort::class)
            ->give(function ($app) {
                return $app->make(ListCityInteractor::class, [
                    'output' => $app->make(ListCityHttpPresenter::class),
                ]);
            });
        app()
            ->when(EditCityController::class)
            ->needs(IEditCityInputPort::class)
            ->give(function ($app) {
                return $app->make(EditCityInteractor::class, [
                    'output' => $app->make(EditCityHttpPresenter::class),
                ]);
            });
        app()
            ->when(UpdateCityController::class)
            ->needs(IUpdateCityInputPort::class)
            ->give(function ($app) {
                return $app->make(UpdateCityInteractor::class, [
                    'output' => $app->make(UpdateCityHttpPresenter::class),
                ]);
            });
        app()
            ->when(DeleteCityController::class)
            ->needs(IDeleteCityInputPort::class)
            ->give(function ($app) {
                return $app->make(DeleteCityInteractor::class, [
                    'output' => $app->make(DeleteCityHttpPresenter::class),
                ]);
            });
        app()
            ->when(DeleteAllCityController::class)
            ->needs(IDeleteAllCityInputPort::class)
            ->give(function ($app) {
                return $app->make(DeleteAllCityInteractor::class, [
                    'output' => $app->make(DeleteAllCityHttpPresenter::class),
                ]);
            });
    }
}
