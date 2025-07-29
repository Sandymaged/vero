<?php

namespace App\Domain\UseCases\Offer\UpdateOffer;

use App\Domain\Interfaces\IViewModel;

interface IUpdateOfferOutputPort
{
    public function offerUpdated(UpdateOfferResponseModel $model): IViewModel;

    public function unableToUpdateOffer(UpdateOfferResponseModel $model, \Throwable $e): IViewModel;

    public function unableToFindOffer(): IViewModel;
}
