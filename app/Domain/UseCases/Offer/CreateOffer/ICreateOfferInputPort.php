<?php

namespace App\Domain\UseCases\Offer\CreateOffer;

use App\Domain\Interfaces\IViewModel;

interface ICreateOfferInputPort
{
    public function createOffer(CreateOfferRequestModel $model): IViewModel;
}
