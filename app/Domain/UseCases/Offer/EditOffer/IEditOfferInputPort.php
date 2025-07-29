<?php

namespace App\Domain\UseCases\Offer\EditOffer;

use App\Domain\Interfaces\IViewModel;

interface IEditOfferInputPort
{
    public function editOffer(int $id, EditOfferRequestModel $model): IViewModel;
}
