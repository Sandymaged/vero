<?php

namespace App\Bindings;

use App\Adapters\Presenters\MerchantBranch\DeleteMerchantBranchHttpPresenter;
use App\Adapters\Presenters\MerchantBranch\DeleteAllMerchantBranchHttpPresenter;
use App\Adapters\Presenters\MerchantBranch\EditMerchantBranchHttpPresenter;
use App\Adapters\Presenters\MerchantBranch\UpdateMerchantBranchHttpPresenter;
use App\Adapters\Presenters\MerchantBranch\CreateMerchantBranchHttpPresenter;
use App\Adapters\Presenters\MerchantBranch\StoreMerchantBranchHttpPresenter;
use App\Adapters\Presenters\MerchantBranch\ListMerchantBranchHttpPresenter;
use App\Domain\Interfaces\Factories\IMerchantBranchFactory;
use App\Domain\Interfaces\Repositories\IMerchantBranchRepository;
use App\Domain\UseCases\MerchantBranch\DeleteMerchantBranch\DeleteMerchantBranchInteractor;
use App\Domain\UseCases\MerchantBranch\DeleteMerchantBranch\IDeleteMerchantBranchInputPort;
use App\Domain\UseCases\MerchantBranch\DeleteAllMerchantBranch\DeleteAllMerchantBranchInteractor;
use App\Domain\UseCases\MerchantBranch\DeleteAllMerchantBranch\IDeleteAllMerchantBranchInputPort;
use App\Domain\UseCases\MerchantBranch\EditMerchantBranch\EditMerchantBranchInteractor;
use App\Domain\UseCases\MerchantBranch\EditMerchantBranch\IEditMerchantBranchInputPort;
use App\Domain\UseCases\MerchantBranch\UpdateMerchantBranch\IUpdateMerchantBranchInputPort;
use App\Domain\UseCases\MerchantBranch\UpdateMerchantBranch\UpdateMerchantBranchInteractor;
use App\Domain\UseCases\MerchantBranch\CreateMerchantBranch\CreateMerchantBranchInteractor;
use App\Domain\UseCases\MerchantBranch\CreateMerchantBranch\ICreateMerchantBranchInputPort;
use App\Domain\UseCases\MerchantBranch\ListMerchantBranch\IListMerchantBranchInputPort;
use App\Domain\UseCases\MerchantBranch\ListMerchantBranch\ListMerchantBranchInteractor;
use App\Domain\UseCases\MerchantBranch\StoreMerchantBranch\IStoreMerchantBranchInputPort;
use App\Domain\UseCases\MerchantBranch\StoreMerchantBranch\StoreMerchantBranchInteractor;
use App\Factories\MerchantBranchModelFactory;
use App\Http\Controllers\Backend\MerchantBranch\DeleteMerchantBranchController;
use App\Http\Controllers\Backend\MerchantBranch\DeleteAllMerchantBranchController;
use App\Http\Controllers\Backend\MerchantBranch\EditMerchantBranchController;
use App\Http\Controllers\Backend\MerchantBranch\UpdateMerchantBranchController;
use App\Http\Controllers\Backend\MerchantBranch\CreateMerchantBranchController;
use App\Http\Controllers\Backend\MerchantBranch\StoreMerchantBranchController;
use App\Http\Controllers\Backend\MerchantBranch\ListMerchantBranchController;
use App\Repositories\MerchantBranchRepository;

final class MerchantBranchBinding
{

    public static function bind()
    {
        // Factory
        app()->bind(
            IMerchantBranchFactory::class,
            MerchantBranchModelFactory::class,
        );

        // Repository
        app()->bind(
            IMerchantBranchRepository::class,
            MerchantBranchRepository::class,
        );

        // UseCases
        app()
            ->when(StoreMerchantBranchController::class)
            ->needs(IStoreMerchantBranchInputPort::class)
            ->give(function ($app) {
                return $app->make(StoreMerchantBranchInteractor::class, [
                    'output' => $app->make(StoreMerchantBranchHttpPresenter::class),
                ]);
            });
        app()
            ->when(CreateMerchantBranchController::class)
            ->needs(ICreateMerchantBranchInputPort::class)
            ->give(function ($app) {
                return $app->make(CreateMerchantBranchInteractor::class, [
                    'output' => $app->make(CreateMerchantBranchHttpPresenter::class),
                ]);
            });
        app()
            ->when(ListMerchantBranchController::class)
            ->needs(IListMerchantBranchInputPort::class)
            ->give(function ($app) {
                return $app->make(ListMerchantBranchInteractor::class, [
                    'output' => $app->make(ListMerchantBranchHttpPresenter::class),
                ]);
            });
        app()
            ->when(EditMerchantBranchController::class)
            ->needs(IEditMerchantBranchInputPort::class)
            ->give(function ($app) {
                return $app->make(EditMerchantBranchInteractor::class, [
                    'output' => $app->make(EditMerchantBranchHttpPresenter::class),
                ]);
            });
        app()
            ->when(UpdateMerchantBranchController::class)
            ->needs(IUpdateMerchantBranchInputPort::class)
            ->give(function ($app) {
                return $app->make(UpdateMerchantBranchInteractor::class, [
                    'output' => $app->make(UpdateMerchantBranchHttpPresenter::class),
                ]);
            });
        app()
            ->when(DeleteMerchantBranchController::class)
            ->needs(IDeleteMerchantBranchInputPort::class)
            ->give(function ($app) {
                return $app->make(DeleteMerchantBranchInteractor::class, [
                    'output' => $app->make(DeleteMerchantBranchHttpPresenter::class),
                ]);
            });
        app()
            ->when(DeleteAllMerchantBranchController::class)
            ->needs(IDeleteAllMerchantBranchInputPort::class)
            ->give(function ($app) {
                return $app->make(DeleteAllMerchantBranchInteractor::class, [
                    'output' => $app->make(DeleteAllMerchantBranchHttpPresenter::class),
                ]);
            });
    }
}
