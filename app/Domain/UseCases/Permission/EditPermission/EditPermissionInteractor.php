<?php

namespace App\Domain\UseCases\Permission\EditPermission;

use App\Domain\Interfaces\Factories\IPermissionFactory;
use App\Domain\Interfaces\IViewModel;
use App\Domain\Interfaces\Repositories\IPermissionRepository;

class EditPermissionInteractor implements IEditPermissionInputPort
{

    private $output;
    private $repository;

    public function __construct(
        IEditPermissionOutputPort $output,
        IPermissionRepository     $repository
    )
    {
        $this->output = $output;
        $this->repository = $repository;
    }

    public function editPermission(int $id, EditPermissionRequestModel $model): IViewModel
    {
        try {
            $permission = $this->repository->find($id);

            if(empty($permission)){
                return $this->output->unableToFindPermission();
            }

        } catch (\Throwable $e) {

        }

        return $this->output->editPermission(
            new EditPermissionResponseModel($permission)
        );
    }
}
