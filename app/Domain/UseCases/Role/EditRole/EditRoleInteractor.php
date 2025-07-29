<?php

namespace App\Domain\UseCases\Role\EditRole;

use App\Domain\Interfaces\Factories\IRoleFactory;
use App\Domain\Interfaces\IViewModel;
use App\Domain\Interfaces\Repositories\IPermissionRepository;
use App\Domain\Interfaces\Repositories\IRoleRepository;

class EditRoleInteractor implements IEditRoleInputPort
{

    private $output;
    private $repository;
    private $permissionRepository;

    public function __construct(
        IEditRoleOutputPort   $output,
        IRoleRepository       $repository,
        IPermissionRepository $permissionRepository
    )
    {
        $this->output = $output;
        $this->repository = $repository;
        $this->permissionRepository = $permissionRepository;
    }

    public function editRole(int $id, EditRoleRequestModel $model): IViewModel
    {
        try {
            $role = $this->repository->find($id);

            if(empty($role)){
                return $this->output->unableToFindRole();
            }

            $permission = $this->permissionRepository->pluck('name', 'id')->toArray();
        } catch (\Throwable $e) {
            return $this->output->error($e);
        }

        return $this->output->editRole(
            new EditRoleResponseModel($role, $permission)
        );
    }
}
