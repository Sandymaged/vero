<?php

namespace App\Domain\UseCases\Admin\DeleteAllAdmin;

use App\Domain\Interfaces\IViewModel;

interface IDeleteAllAdminOutputPort
{
    public function adminsDeleted(): IViewModel;

    public function unableToDeleteAllAdmin(\Throwable $e): IViewModel;
}
