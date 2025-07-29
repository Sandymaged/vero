<?php

namespace App\Domain\UseCases\Offer\DeleteOffer;

use App\Domain\Interfaces\IViewModel;

interface IDeleteOfferInputPort
{
    public function deleteOffer(int $id, DeleteOfferRequestModel $model): IViewModel;
}
