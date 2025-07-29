<?php

namespace App\Domain\UseCases\Service\EditService;

use App\Domain\Interfaces\IViewModel;

interface IEditServiceInputPort
{
    public function editService(int $id, EditServiceRequestModel $model): IViewModel;
}
