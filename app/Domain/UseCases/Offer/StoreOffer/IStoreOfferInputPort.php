<?php

namespace App\Domain\UseCases\Offer\StoreOffer;

use App\Domain\Interfaces\IViewModel;

interface IStoreOfferInputPort
{
    public function createOffer(StoreOfferRequestModel $model): IViewModel;
}
