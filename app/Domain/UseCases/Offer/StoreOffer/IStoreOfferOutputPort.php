<?php

namespace App\Domain\UseCases\Offer\StoreOffer;

use App\Domain\Interfaces\IViewModel;

interface IStoreOfferOutputPort
{
    public function offerCreated(StoreOfferResponseModel $model): IViewModel;

    public function unableToStoreOffer(StoreOfferResponseModel $model, \Throwable $e): IViewModel;
}
