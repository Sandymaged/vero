<?php

namespace App\Domain\UseCases\Permission\UpdatePermission;

use App\Domain\Interfaces\Factories\IPermissionFactory;
use App\Domain\Interfaces\IViewModel;
use App\Domain\Interfaces\Repositories\IPermissionRepository;
use App\Models\Permission;
use App\Utiles\ImageManager;
use App\ValueObjects\PasswordValueObject;

class UpdatePermissionInteractor implements IUpdatePermissionInputPort
{

    private $output;
    private $repository;
    private $factory;

    public function __construct(
        IUpdatePermissionOutputPort $output,
        IPermissionRepository       $repository,
        IPermissionFactory          $factory
    )
    {
        $this->output = $output;
        $this->repository = $repository;
        $this->factory = $factory;
    }

    public function updatePermission(int $id, UpdatePermissionRequestModel $request): IViewModel
    {
        $permission = $this->factory->make([
            'name' => $request->getName(),
            'guard_name' => $request->getGuardName(),
        ]);

        try {
            if (empty($this->repository->find($id))) {
                return $this->output->unableToFindPermission();
            }

            $this->repository->update($permission->toArray(), $id);
        } catch (\Throwable $e) {
            return $this->output->unableToUpdatePermission(new UpdatePermissionResponseModel($permission), $e);
        }

        return $this->output->permissionUpdated(
            new UpdatePermissionResponseModel($permission)
        );
    }
}
