<?php

namespace App\Domain\UseCases\Permission\StorePermission;

use App\Domain\Interfaces\Factories\IPermissionFactory;
use App\Domain\Interfaces\IViewModel;
use App\Domain\Interfaces\Repositories\IPermissionRepository;
use App\Models\Permission;
use App\Utiles\ImageManager;
use App\ValueObjects\PasswordValueObject;

class StorePermissionInteractor implements IStorePermissionInputPort
{

    private $output;
    private $repository;
    private $factory;

    public function __construct(
        IStorePermissionOutputPort $output,
        IPermissionRepository       $repository,
        IPermissionFactory          $factory
    )
    {
        $this->output = $output;
        $this->repository = $repository;
        $this->factory = $factory;
    }

    public function createPermission(StorePermissionRequestModel $request): IViewModel
    {
        $permission = $this->factory->make([
            'name' => $request->getName(),
            'guard_name' => $request->getGuardName(),
        ]);

        try {
            $this->repository->create($permission->toArray());
        } catch (\Throwable $e) {
            return $this->output->unableToStorePermission(new StorePermissionResponseModel($permission), $e);
        }

        return $this->output->permissionCreated(
            new StorePermissionResponseModel($permission)
        );
    }
}
