<?php

namespace App\Domain\UseCases\Service\UpdateService;

use App\Domain\Interfaces\IViewModel;

interface IUpdateServiceOutputPort
{
    public function serviceUpdated(UpdateServiceResponseModel $model): IViewModel;

    public function unableToUpdateService(UpdateServiceResponseModel $model, \Throwable $e): IViewModel;

    public function unableToFindService(): IViewModel;
}
