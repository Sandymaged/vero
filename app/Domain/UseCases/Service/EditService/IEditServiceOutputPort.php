<?php

namespace App\Domain\UseCases\Service\EditService;

use App\Domain\Interfaces\IViewModel;

interface IEditServiceOutputPort
{
    public function editService(EditServiceResponseModel $model): IViewModel;

    public function unableToFindService(): IViewModel;
}
