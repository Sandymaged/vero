<?php

namespace App\Bindings;

use App\Adapters\Presenters\Category\DeleteCategoryHttpPresenter;
use App\Adapters\Presenters\Category\DeleteAllCategoryHttpPresenter;
use App\Adapters\Presenters\Category\EditCategoryHttpPresenter;
use App\Adapters\Presenters\Category\UpdateCategoryHttpPresenter;
use App\Adapters\Presenters\Category\CreateCategoryHttpPresenter;
use App\Adapters\Presenters\Category\ListCategoryHttpPresenter;
use App\Adapters\Presenters\Category\StoreCategoryHttpPresenter;
use App\Domain\Interfaces\Factories\ICategoryFactory;
use App\Domain\Interfaces\Repositories\ICategoryRepository;
use App\Domain\UseCases\Category\DeleteCategory\DeleteCategoryInteractor;
use App\Domain\UseCases\Category\DeleteCategory\IDeleteCategoryInputPort;
use App\Domain\UseCases\Category\DeleteAllCategory\DeleteAllCategoryInteractor;
use App\Domain\UseCases\Category\DeleteAllCategory\IDeleteAllCategoryInputPort;
use App\Domain\UseCases\Category\EditCategory\EditCategoryInteractor;
use App\Domain\UseCases\Category\EditCategory\IEditCategoryInputPort;
use App\Domain\UseCases\Category\UpdateCategory\IUpdateCategoryInputPort;
use App\Domain\UseCases\Category\UpdateCategory\UpdateCategoryInteractor;
use App\Domain\UseCases\Category\CreateCategory\CreateCategoryInteractor;
use App\Domain\UseCases\Category\CreateCategory\ICreateCategoryInputPort;
use App\Domain\UseCases\Category\ListCategory\IListCategoryInputPort;
use App\Domain\UseCases\Category\ListCategory\ListCategoryInteractor;
use App\Domain\UseCases\Category\StoreCategory\IStoreCategoryInputPort;
use App\Domain\UseCases\Category\StoreCategory\StoreCategoryInteractor;
use App\Factories\CategoryModelFactory;
use App\Http\Controllers\Backend\Category\DeleteCategoryController;
use App\Http\Controllers\Backend\Category\DeleteAllCategoryController;
use App\Http\Controllers\Backend\Category\EditCategoryController;
use App\Http\Controllers\Backend\Category\UpdateCategoryController;
use App\Http\Controllers\Backend\Category\CreateCategoryController;
use App\Http\Controllers\Backend\Category\ListCategoryController;
use App\Http\Controllers\Backend\Category\StoreCategoryController;
use App\Repositories\CategoryRepository;

final class CategoryBinding
{

    public static function bind()
    {
        // Factory
        app()->bind(
            ICategoryFactory::class,
            CategoryModelFactory::class,
        );

        // Repository
        app()->bind(
            ICategoryRepository::class,
            CategoryRepository::class,
        );

        // UseCases
        app()
            ->when(StoreCategoryController::class)
            ->needs(IStoreCategoryInputPort::class)
            ->give(function ($app) {
                return $app->make(StoreCategoryInteractor::class, [
                    'output' => $app->make(StoreCategoryHttpPresenter::class),
                ]);
            });
        app()
            ->when(CreateCategoryController::class)
            ->needs(ICreateCategoryInputPort::class)
            ->give(function ($app) {
                return $app->make(CreateCategoryInteractor::class, [
                    'output' => $app->make(CreateCategoryHttpPresenter::class),
                ]);
            });
        app()
            ->when(ListCategoryController::class)
            ->needs(IListCategoryInputPort::class)
            ->give(function ($app) {
                return $app->make(ListCategoryInteractor::class, [
                    'output' => $app->make(ListCategoryHttpPresenter::class),
                ]);
            });
        app()
            ->when(EditCategoryController::class)
            ->needs(IEditCategoryInputPort::class)
            ->give(function ($app) {
                return $app->make(EditCategoryInteractor::class, [
                    'output' => $app->make(EditCategoryHttpPresenter::class),
                ]);
            });
        app()
            ->when(UpdateCategoryController::class)
            ->needs(IUpdateCategoryInputPort::class)
            ->give(function ($app) {
                return $app->make(UpdateCategoryInteractor::class, [
                    'output' => $app->make(UpdateCategoryHttpPresenter::class),
                ]);
            });
        app()
            ->when(DeleteCategoryController::class)
            ->needs(IDeleteCategoryInputPort::class)
            ->give(function ($app) {
                return $app->make(DeleteCategoryInteractor::class, [
                    'output' => $app->make(DeleteCategoryHttpPresenter::class),
                ]);
            });
        app()
            ->when(DeleteAllCategoryController::class)
            ->needs(IDeleteAllCategoryInputPort::class)
            ->give(function ($app) {
                return $app->make(DeleteAllCategoryInteractor::class, [
                    'output' => $app->make(DeleteAllCategoryHttpPresenter::class),
                ]);
            });
    }
}
