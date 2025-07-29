<?php

namespace App\Domain\UseCases\Offer\DeleteAllOffer;

use App\Domain\Interfaces\IViewModel;

interface IDeleteAllOfferInputPort
{
    public function deleteAllOffer(DeleteAllOfferRequestModel $model): IViewModel;
}
