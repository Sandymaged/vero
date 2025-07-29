<?php

namespace App\Bindings;

use App\Adapters\Presenters\Subcategory\DeleteSubcategoryHttpPresenter;
use App\Adapters\Presenters\Subcategory\DeleteAllSubcategoryHttpPresenter;
use App\Adapters\Presenters\Subcategory\EditSubcategoryHttpPresenter;
use App\Adapters\Presenters\Subcategory\UpdateSubcategoryHttpPresenter;
use App\Adapters\Presenters\Subcategory\CreateSubcategoryHttpPresenter;
use App\Adapters\Presenters\Subcategory\ListSubcategoryHttpPresenter;
use App\Adapters\Presenters\Subcategory\StoreSubcategoryHttpPresenter;
use App\Domain\Interfaces\Factories\ISubcategoryFactory;
use App\Domain\Interfaces\Repositories\ISubcategoryRepository;
use App\Domain\UseCases\Subcategory\DeleteSubcategory\DeleteSubcategoryInteractor;
use App\Domain\UseCases\Subcategory\DeleteSubcategory\IDeleteSubcategoryInputPort;
use App\Domain\UseCases\Subcategory\DeleteAllSubcategory\DeleteAllSubcategoryInteractor;
use App\Domain\UseCases\Subcategory\DeleteAllSubcategory\IDeleteAllSubcategoryInputPort;
use App\Domain\UseCases\Subcategory\EditSubcategory\EditSubcategoryInteractor;
use App\Domain\UseCases\Subcategory\EditSubcategory\IEditSubcategoryInputPort;
use App\Domain\UseCases\Subcategory\UpdateSubcategory\IUpdateSubcategoryInputPort;
use App\Domain\UseCases\Subcategory\UpdateSubcategory\UpdateSubcategoryInteractor;
use App\Domain\UseCases\Subcategory\CreateSubcategory\CreateSubcategoryInteractor;
use App\Domain\UseCases\Subcategory\CreateSubcategory\ICreateSubcategoryInputPort;
use App\Domain\UseCases\Subcategory\ListSubcategory\IListSubcategoryInputPort;
use App\Domain\UseCases\Subcategory\ListSubcategory\ListSubcategoryInteractor;
use App\Domain\UseCases\Subcategory\StoreSubcategory\IStoreSubcategoryInputPort;
use App\Domain\UseCases\Subcategory\StoreSubcategory\StoreSubcategoryInteractor;
use App\Factories\SubcategoryModelFactory;
use App\Http\Controllers\Backend\Subcategory\DeleteSubcategoryController;
use App\Http\Controllers\Backend\Subcategory\DeleteAllSubcategoryController;
use App\Http\Controllers\Backend\Subcategory\EditSubcategoryController;
use App\Http\Controllers\Backend\Subcategory\UpdateSubcategoryController;
use App\Http\Controllers\Backend\Subcategory\CreateSubcategoryController;
use App\Http\Controllers\Backend\Subcategory\ListSubcategoryController;
use App\Http\Controllers\Backend\Subcategory\StoreSubcategoryController;
use App\Repositories\SubcategoryRepository;

final class SubcategoryBinding
{

    public static function bind()
    {
        // Factory
        app()->bind(
            ISubcategoryFactory::class,
            SubcategoryModelFactory::class,
        );

        // Repository
        app()->bind(
            ISubcategoryRepository::class,
            SubcategoryRepository::class,
        );

        // UseCases
        app()
            ->when(StoreSubcategoryController::class)
            ->needs(IStoreSubcategoryInputPort::class)
            ->give(function ($app) {
                return $app->make(StoreSubcategoryInteractor::class, [
                    'output' => $app->make(StoreSubcategoryHttpPresenter::class),
                ]);
            });
        app()
            ->when(CreateSubcategoryController::class)
            ->needs(ICreateSubcategoryInputPort::class)
            ->give(function ($app) {
                return $app->make(CreateSubcategoryInteractor::class, [
                    'output' => $app->make(CreateSubcategoryHttpPresenter::class),
                ]);
            });
        app()
            ->when(ListSubcategoryController::class)
            ->needs(IListSubcategoryInputPort::class)
            ->give(function ($app) {
                return $app->make(ListSubcategoryInteractor::class, [
                    'output' => $app->make(ListSubcategoryHttpPresenter::class),
                ]);
            });
        app()
            ->when(EditSubcategoryController::class)
            ->needs(IEditSubcategoryInputPort::class)
            ->give(function ($app) {
                return $app->make(EditSubcategoryInteractor::class, [
                    'output' => $app->make(EditSubcategoryHttpPresenter::class),
                ]);
            });
        app()
            ->when(UpdateSubcategoryController::class)
            ->needs(IUpdateSubcategoryInputPort::class)
            ->give(function ($app) {
                return $app->make(UpdateSubcategoryInteractor::class, [
                    'output' => $app->make(UpdateSubcategoryHttpPresenter::class),
                ]);
            });
        app()
            ->when(DeleteSubcategoryController::class)
            ->needs(IDeleteSubcategoryInputPort::class)
            ->give(function ($app) {
                return $app->make(DeleteSubcategoryInteractor::class, [
                    'output' => $app->make(DeleteSubcategoryHttpPresenter::class),
                ]);
            });
        app()
            ->when(DeleteAllSubcategoryController::class)
            ->needs(IDeleteAllSubcategoryInputPort::class)
            ->give(function ($app) {
                return $app->make(DeleteAllSubcategoryInteractor::class, [
                    'output' => $app->make(DeleteAllSubcategoryHttpPresenter::class),
                ]);
            });
    }
}
