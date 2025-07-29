<?php

namespace App\Domain\UseCases\Offer\ListOffer;

use App\Domain\Interfaces\IViewModel;

interface IListOfferOutputPort
{
    public function offerListed(ListOfferResponseModel $model): IViewModel;
}
