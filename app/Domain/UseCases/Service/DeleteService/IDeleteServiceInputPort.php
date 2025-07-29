<?php

namespace App\Domain\UseCases\Service\DeleteService;

use App\Domain\Interfaces\IViewModel;

interface IDeleteServiceInputPort
{
    public function deleteService(int $id, DeleteServiceRequestModel $model): IViewModel;
}
