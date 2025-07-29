<?php

namespace App\Domain\UseCases\Permission\DeletePermission;


use App\Domain\Interfaces\Factories\IPermissionFactory;
use App\Domain\Interfaces\IViewModel;
use App\Domain\Interfaces\Repositories\IPermissionRepository;

class DeletePermissionInteractor implements IDeletePermissionInputPort
{

    private $output;
    private $repository;
    private $factory;

    public function __construct(
        IDeletePermissionOutputPort $output,
        IPermissionRepository       $repository,
        IPermissionFactory          $factory
    )
    {
        $this->output = $output;
        $this->repository = $repository;
        $this->factory = $factory;
    }

    public function deletePermission(int $id, DeletePermissionRequestModel $request): IViewModel
    {

        try {
            $permission = $this->repository->find($id);

            if (empty($permission)) {
                return $this->output->unableToFindPermission();
            }

            $this->repository->delete($id);
        } catch (\Throwable $e) {
            return $this->output->unableToDeletePermission($e);
        }

        return $this->output->permissionDeleted(
            new DeletePermissionResponseModel($permission)
        );
    }
}
