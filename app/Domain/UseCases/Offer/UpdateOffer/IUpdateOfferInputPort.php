<?php

namespace App\Domain\UseCases\Offer\UpdateOffer;

use App\Domain\Interfaces\IViewModel;

interface IUpdateOfferInputPort
{
    public function updateOffer(int $id, UpdateOfferRequestModel $model): IViewModel;
}
