<?php

namespace App\Domain\UseCases\Offer\EditOffer;

use App\Domain\Interfaces\IViewModel;

interface IEditOfferOutputPort
{
    public function editOffer(EditOfferResponseModel $model): IViewModel;

    public function unableToFindOffer(): IViewModel;
}
