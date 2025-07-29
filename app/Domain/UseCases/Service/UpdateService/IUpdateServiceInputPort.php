<?php

namespace App\Domain\UseCases\Service\UpdateService;

use App\Domain\Interfaces\IViewModel;

interface IUpdateServiceInputPort
{
    public function updateService(int $id, UpdateServiceRequestModel $model): IViewModel;
}
