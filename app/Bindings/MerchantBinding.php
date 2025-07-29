<?php

namespace App\Bindings;

use App\Adapters\Presenters\Merchant\PaginateMerchantHttpPresenter;
use App\Adapters\Presenters\Merchant\DeleteMerchantHttpPresenter;
use App\Adapters\Presenters\Merchant\DeleteAllMerchantHttpPresenter;
use App\Adapters\Presenters\Merchant\EditMerchantHttpPresenter;
use App\Adapters\Presenters\Merchant\UpdateMerchantHttpPresenter;
use App\Adapters\Presenters\Merchant\CreateMerchantHttpPresenter;
use App\Adapters\Presenters\Merchant\StoreMerchantHttpPresenter;
use App\Adapters\Presenters\Merchant\ListMerchantHttpPresenter;
use App\Domain\Interfaces\Factories\IMerchantFactory;
use App\Domain\Interfaces\Repositories\IMerchantRepository;
use App\Domain\UseCases\Merchant\PaginateMerchant\IPaginateMerchantInputPort;
use App\Domain\UseCases\Merchant\PaginateMerchant\PaginateMerchantInteractor;
use App\Domain\UseCases\Merchant\DeleteMerchant\DeleteMerchantInteractor;
use App\Domain\UseCases\Merchant\DeleteMerchant\IDeleteMerchantInputPort;
use App\Domain\UseCases\Merchant\DeleteAllMerchant\DeleteAllMerchantInteractor;
use App\Domain\UseCases\Merchant\DeleteAllMerchant\IDeleteAllMerchantInputPort;
use App\Domain\UseCases\Merchant\EditMerchant\EditMerchantInteractor;
use App\Domain\UseCases\Merchant\EditMerchant\IEditMerchantInputPort;
use App\Domain\UseCases\Merchant\UpdateMerchant\IUpdateMerchantInputPort;
use App\Domain\UseCases\Merchant\UpdateMerchant\UpdateMerchantInteractor;
use App\Domain\UseCases\Merchant\CreateMerchant\CreateMerchantInteractor;
use App\Domain\UseCases\Merchant\CreateMerchant\ICreateMerchantInputPort;
use App\Domain\UseCases\Merchant\ListMerchant\IListMerchantInputPort;
use App\Domain\UseCases\Merchant\ListMerchant\ListMerchantInteractor;
use App\Domain\UseCases\Merchant\StoreMerchant\IStoreMerchantInputPort;
use App\Domain\UseCases\Merchant\StoreMerchant\StoreMerchantInteractor;
use App\Factories\MerchantModelFactory;
use App\Http\Controllers\Backend\Merchant\PaginateMerchantController;
use App\Http\Controllers\Backend\Merchant\DeleteMerchantController;
use App\Http\Controllers\Backend\Merchant\DeleteAllMerchantController;
use App\Http\Controllers\Backend\Merchant\EditMerchantController;
use App\Http\Controllers\Backend\Merchant\UpdateMerchantController;
use App\Http\Controllers\Backend\Merchant\CreateMerchantController;
use App\Http\Controllers\Backend\Merchant\StoreMerchantController;
use App\Http\Controllers\Backend\Merchant\ListMerchantController;
use App\Repositories\MerchantRepository;

final class MerchantBinding
{

    public static function bind()
    {
        // Factory
        app()->bind(
            IMerchantFactory::class,
            MerchantModelFactory::class,
        );

        // Repository
        app()->bind(
            IMerchantRepository::class,
            MerchantRepository::class,
        );

        // UseCases
        app()
            ->when(StoreMerchantController::class)
            ->needs(IStoreMerchantInputPort::class)
            ->give(function ($app) {
                return $app->make(StoreMerchantInteractor::class, [
                    'output' => $app->make(StoreMerchantHttpPresenter::class),
                ]);
            });
        app()
            ->when(CreateMerchantController::class)
            ->needs(ICreateMerchantInputPort::class)
            ->give(function ($app) {
                return $app->make(CreateMerchantInteractor::class, [
                    'output' => $app->make(CreateMerchantHttpPresenter::class),
                ]);
            });
        app()
            ->when(ListMerchantController::class)
            ->needs(IListMerchantInputPort::class)
            ->give(function ($app) {
                return $app->make(ListMerchantInteractor::class, [
                    'output' => $app->make(ListMerchantHttpPresenter::class),
                ]);
            });
        app()
            ->when(EditMerchantController::class)
            ->needs(IEditMerchantInputPort::class)
            ->give(function ($app) {
                return $app->make(EditMerchantInteractor::class, [
                    'output' => $app->make(EditMerchantHttpPresenter::class),
                ]);
            });
        app()
            ->when(UpdateMerchantController::class)
            ->needs(IUpdateMerchantInputPort::class)
            ->give(function ($app) {
                return $app->make(UpdateMerchantInteractor::class, [
                    'output' => $app->make(UpdateMerchantHttpPresenter::class),
                ]);
            });
        app()
            ->when(DeleteMerchantController::class)
            ->needs(IDeleteMerchantInputPort::class)
            ->give(function ($app) {
                return $app->make(DeleteMerchantInteractor::class, [
                    'output' => $app->make(DeleteMerchantHttpPresenter::class),
                ]);
            });
        app()
            ->when(DeleteAllMerchantController::class)
            ->needs(IDeleteAllMerchantInputPort::class)
            ->give(function ($app) {
                return $app->make(DeleteAllMerchantInteractor::class, [
                    'output' => $app->make(DeleteAllMerchantHttpPresenter::class),
                ]);
            });
        app()
            ->when(PaginateMerchantController::class)
            ->needs(IPaginateMerchantInputPort::class)
            ->give(function ($app) {
                return $app->make(PaginateMerchantInteractor::class, [
                    'output' => $app->make(PaginateMerchantHttpPresenter::class),
                ]);
            });
    }
}
