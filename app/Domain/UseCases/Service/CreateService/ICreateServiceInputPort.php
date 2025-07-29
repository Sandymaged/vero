<?php

namespace App\Domain\UseCases\Service\CreateService;

use App\Domain\Interfaces\IViewModel;

interface ICreateServiceInputPort
{
    public function createService(CreateServiceRequestModel $model): IViewModel;
}
