<?php

namespace App\Domain\UseCases\Service\DeleteService;

use App\Domain\Interfaces\IViewModel;

interface IDeleteServiceOutputPort
{
    public function serviceDeleted(DeleteServiceResponseModel $model): IViewModel;

    public function unableToDeleteService(\Throwable $e): IViewModel;

    public function unableToFindService(): IViewModel;
}
