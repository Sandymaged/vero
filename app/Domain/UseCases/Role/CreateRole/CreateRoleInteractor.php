<?php

namespace App\Domain\UseCases\Role\CreateRole;

use App\Domain\Interfaces\IViewModel;
use App\Domain\Interfaces\Repositories\IPermissionRepository;

class CreateRoleInteractor implements ICreateRoleInputPort
{

    private $output;
    private $permissionRepository;

    public function __construct(
        ICreateRoleOutputPort $output,
        IPermissionRepository     $permissionRepository
    )
    {
        $this->output = $output;
        $this->permissionRepository = $permissionRepository;
    }

    public function createRole(CreateRoleRequestModel $model): IViewModel
    {
        try {
            $permission = $this->permissionRepository->pluck('name', 'id')->toArray();
        } catch (\Throwable $e) {
            return $this->output->error($e);
        }

        return $this->output->createRole(
            new CreateRoleResponseModel($permission)
        );
    }
}
