<?php

namespace App\Domain\UseCases\Offer\DeleteAllOffer;

use App\Domain\Interfaces\IViewModel;

interface IDeleteAllOfferOutputPort
{
    public function offersDeleted(): IViewModel;

    public function unableToDeleteAllOffer(\Throwable $e): IViewModel;
}
