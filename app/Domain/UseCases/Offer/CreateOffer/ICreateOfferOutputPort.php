<?php

namespace App\Domain\UseCases\Offer\CreateOffer;

use App\Domain\Interfaces\IViewModel;

interface ICreateOfferOutputPort
{
    public function createOffer(CreateOfferResponseModel $model): IViewModel;
}
