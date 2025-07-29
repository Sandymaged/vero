<?php

namespace App\Domain\UseCases\Service\ListService;

use App\Domain\Interfaces\IViewModel;

interface IListServiceOutputPort
{
    public function serviceListed(ListServiceResponseModel $model): IViewModel;
}
