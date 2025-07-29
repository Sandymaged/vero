<?php

namespace App\Domain\UseCases\Service\DeleteAllService;

use App\Domain\Interfaces\IViewModel;

interface IDeleteAllServiceInputPort
{
    public function deleteAllService(DeleteAllServiceRequestModel $model): IViewModel;
}
