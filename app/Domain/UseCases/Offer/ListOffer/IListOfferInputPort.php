<?php

namespace App\Domain\UseCases\Offer\ListOffer;

use App\Domain\Interfaces\IViewModel;

interface IListOfferInputPort
{
    public function listOffer(ListOfferRequestModel $model): IViewModel;
}
