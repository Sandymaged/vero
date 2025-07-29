<?php

namespace App\Domain\UseCases\Role\UpdateRole;

use App\Domain\Interfaces\Factories\IRoleFactory;
use App\Domain\Interfaces\IViewModel;
use App\Domain\Interfaces\Repositories\IRoleRepository;
use App\Models\Role;
use App\Utiles\ImageManager;
use App\ValueObjects\PasswordValueObject;

class UpdateRoleInteractor implements IUpdateRoleInputPort
{

    private $output;
    private $repository;
    private $factory;

    public function __construct(
        IUpdateRoleOutputPort $output,
        IRoleRepository       $repository,
        IRoleFactory          $factory
    )
    {
        $this->output = $output;
        $this->repository = $repository;
        $this->factory = $factory;
    }

    public function updateRole(int $id, UpdateRoleRequestModel $request): IViewModel
    {
        $role = $this->factory->make([
            'name' => $request->getName(),
            'guard_name' => $request->getGuardName(),
        ]);

        try {
            if (empty($this->repository->find($id))) {
                return $this->output->unableToFindRole();
            }

            $role = $this->repository->update($role->toArray(), $id);
            $role->syncPermissions($request->getPermissions());
        } catch (\Throwable $e) {
            return $this->output->unableToUpdateRole(new UpdateRoleResponseModel($role), $e);
        }

        return $this->output->roleUpdated(
            new UpdateRoleResponseModel($role)
        );
    }
}
