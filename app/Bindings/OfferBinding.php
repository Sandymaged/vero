<?php

namespace App\Bindings;

use App\Adapters\Presenters\Offer\DeleteOfferHttpPresenter;
use App\Adapters\Presenters\Offer\DeleteAllOfferHttpPresenter;
use App\Adapters\Presenters\Offer\EditOfferHttpPresenter;
use App\Adapters\Presenters\Offer\UpdateOfferHttpPresenter;
use App\Adapters\Presenters\Offer\CreateOfferHttpPresenter;
use App\Adapters\Presenters\Offer\StoreOfferHttpPresenter;
use App\Adapters\Presenters\Offer\ListOfferHttpPresenter;
use App\Domain\Interfaces\Factories\IOfferFactory;
use App\Domain\Interfaces\Repositories\IOfferRepository;
use App\Domain\UseCases\Offer\DeleteOffer\DeleteOfferInteractor;
use App\Domain\UseCases\Offer\DeleteOffer\IDeleteOfferInputPort;
use App\Domain\UseCases\Offer\DeleteAllOffer\DeleteAllOfferInteractor;
use App\Domain\UseCases\Offer\DeleteAllOffer\IDeleteAllOfferInputPort;
use App\Domain\UseCases\Offer\EditOffer\EditOfferInteractor;
use App\Domain\UseCases\Offer\EditOffer\IEditOfferInputPort;
use App\Domain\UseCases\Offer\UpdateOffer\IUpdateOfferInputPort;
use App\Domain\UseCases\Offer\UpdateOffer\UpdateOfferInteractor;
use App\Domain\UseCases\Offer\CreateOffer\CreateOfferInteractor;
use App\Domain\UseCases\Offer\CreateOffer\ICreateOfferInputPort;
use App\Domain\UseCases\Offer\ListOffer\IListOfferInputPort;
use App\Domain\UseCases\Offer\ListOffer\ListOfferInteractor;
use App\Domain\UseCases\Offer\StoreOffer\IStoreOfferInputPort;
use App\Domain\UseCases\Offer\StoreOffer\StoreOfferInteractor;
use App\Factories\OfferModelFactory;
use App\Http\Controllers\Backend\Offer\DeleteOfferController;
use App\Http\Controllers\Backend\Offer\DeleteAllOfferController;
use App\Http\Controllers\Backend\Offer\EditOfferController;
use App\Http\Controllers\Backend\Offer\UpdateOfferController;
use App\Http\Controllers\Backend\Offer\CreateOfferController;
use App\Http\Controllers\Backend\Offer\StoreOfferController;
use App\Http\Controllers\Backend\Offer\ListOfferController;
use App\Repositories\OfferRepository;

final class OfferBinding
{

    public static function bind()
    {
        // Factory
        app()->bind(
            IOfferFactory::class,
            OfferModelFactory::class,
        );

        // Repository
        app()->bind(
            IOfferRepository::class,
            OfferRepository::class,
        );

        // UseCases
        app()
            ->when(StoreOfferController::class)
            ->needs(IStoreOfferInputPort::class)
            ->give(function ($app) {
                return $app->make(StoreOfferInteractor::class, [
                    'output' => $app->make(StoreOfferHttpPresenter::class),
                ]);
            });
        app()
            ->when(CreateOfferController::class)
            ->needs(ICreateOfferInputPort::class)
            ->give(function ($app) {
                return $app->make(CreateOfferInteractor::class, [
                    'output' => $app->make(CreateOfferHttpPresenter::class),
                ]);
            });
        app()
            ->when(ListOfferController::class)
            ->needs(IListOfferInputPort::class)
            ->give(function ($app) {
                return $app->make(ListOfferInteractor::class, [
                    'output' => $app->make(ListOfferHttpPresenter::class),
                ]);
            });
        app()
            ->when(EditOfferController::class)
            ->needs(IEditOfferInputPort::class)
            ->give(function ($app) {
                return $app->make(EditOfferInteractor::class, [
                    'output' => $app->make(EditOfferHttpPresenter::class),
                ]);
            });
        app()
            ->when(UpdateOfferController::class)
            ->needs(IUpdateOfferInputPort::class)
            ->give(function ($app) {
                return $app->make(UpdateOfferInteractor::class, [
                    'output' => $app->make(UpdateOfferHttpPresenter::class),
                ]);
            });
        app()
            ->when(DeleteOfferController::class)
            ->needs(IDeleteOfferInputPort::class)
            ->give(function ($app) {
                return $app->make(DeleteOfferInteractor::class, [
                    'output' => $app->make(DeleteOfferHttpPresenter::class),
                ]);
            });
        app()
            ->when(DeleteAllOfferController::class)
            ->needs(IDeleteAllOfferInputPort::class)
            ->give(function ($app) {
                return $app->make(DeleteAllOfferInteractor::class, [
                    'output' => $app->make(DeleteAllOfferHttpPresenter::class),
                ]);
            });
    }
}
