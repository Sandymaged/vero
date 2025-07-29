<?php

namespace App\Domain\UseCases\State\EditState;

use App\Domain\Interfaces\IViewModel;

interface IEditStateInputPort
{
    public function editState(int $id, EditStateRequestModel $model): IViewModel;
}
