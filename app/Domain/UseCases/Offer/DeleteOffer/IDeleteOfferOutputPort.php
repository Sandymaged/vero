<?php

namespace App\Domain\UseCases\Offer\DeleteOffer;

use App\Domain\Interfaces\IViewModel;

interface IDeleteOfferOutputPort
{
    public function offerDeleted(DeleteOfferResponseModel $model): IViewModel;

    public function unableToDeleteOffer(\Throwable $e): IViewModel;

    public function unableToFindOffer(): IViewModel;
}
