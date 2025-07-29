<?php

namespace App\Domain\UseCases\State\EditState;

use App\Domain\Interfaces\IViewModel;

interface IEditStateOutputPort
{
    public function editState(EditStateResponseModel $model): IViewModel;

    public function unableToFindState(): IViewModel;
}
