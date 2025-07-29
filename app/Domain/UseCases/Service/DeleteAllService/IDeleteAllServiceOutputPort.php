<?php

namespace App\Domain\UseCases\Service\DeleteAllService;

use App\Domain\Interfaces\IViewModel;

interface IDeleteAllServiceOutputPort
{
    public function servicesDeleted(): IViewModel;

    public function unableToDeleteAllService(\Throwable $e): IViewModel;
}
