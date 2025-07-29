<?php

namespace App\Domain\UseCases\Permission\DeleteAllPermission;


use App\Domain\Interfaces\Factories\IPermissionFactory;
use App\Domain\Interfaces\IViewModel;
use App\Domain\Interfaces\Repositories\IPermissionRepository;

class DeleteAllPermissionInteractor implements IDeleteAllPermissionInputPort
{

    private $output;
    private $repository;
    private $factory;

    public function __construct(
        IDeleteAllPermissionOutputPort $output,
        IPermissionRepository          $repository,
        IPermissionFactory             $factory
    )
    {
        $this->output = $output;
        $this->repository = $repository;
        $this->factory = $factory;
    }

    public function deleteAllPermission(DeleteAllPermissionRequestModel $request): IViewModel
    {

        try {
            $this->repository->deleteWhere([
                ['id', 'IN', $request->getIds()]
            ]);

        } catch (\Throwable $e) {
            return $this->output->unableToDeleteAllPermission($e);
        }

        return $this->output->permissionsDeleted();
    }
}
