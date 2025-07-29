<?php

namespace App\Domain\UseCases\Role\StoreRole;

use App\Domain\Interfaces\Factories\IRoleFactory;
use App\Domain\Interfaces\IViewModel;
use App\Domain\Interfaces\Repositories\IRoleRepository;
use App\Models\Role;
use App\Utiles\ImageManager;
use App\ValueObjects\PasswordValueObject;

class StoreRoleInteractor implements IStoreRoleInputPort
{

    private $output;
    private $repository;
    private $factory;

    public function __construct(
        IStoreRoleOutputPort $output,
        IRoleRepository       $repository,
        IRoleFactory          $factory
    )
    {
        $this->output = $output;
        $this->repository = $repository;
        $this->factory = $factory;
    }

    public function createRole(StoreRoleRequestModel $request): IViewModel
    {
        $role = $this->factory->make([
            'name' => $request->getName(),
            'guard_name' => $request->getGuardName(),
        ]);

        try {
            $role = $this->repository->create($role->toArray());
            $role->givePermissionTo($request->getPermissions());
        } catch (\Throwable $e) {
            return $this->output->unableToStoreRole(new StoreRoleResponseModel($role), $e);
        }

        return $this->output->roleCreated(
            new StoreRoleResponseModel($role)
        );
    }
}
