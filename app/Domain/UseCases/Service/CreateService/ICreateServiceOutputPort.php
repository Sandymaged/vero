<?php

namespace App\Domain\UseCases\Service\CreateService;

use App\Domain\Interfaces\IViewModel;

interface ICreateServiceOutputPort
{
    public function createService(CreateServiceResponseModel $model): IViewModel;
}
