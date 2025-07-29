<?php

namespace App\Domain\UseCases\Role\DeleteRole;


use App\Domain\Interfaces\Factories\IRoleFactory;
use App\Domain\Interfaces\IViewModel;
use App\Domain\Interfaces\Repositories\IRoleRepository;

class DeleteRoleInteractor implements IDeleteRoleInputPort
{

    private $output;
    private $repository;
    private $factory;

    public function __construct(
        IDeleteRoleOutputPort $output,
        IRoleRepository       $repository,
        IRoleFactory          $factory
    )
    {
        $this->output = $output;
        $this->repository = $repository;
        $this->factory = $factory;
    }

    public function deleteRole(int $id, DeleteRoleRequestModel $request): IViewModel
    {

        try {
            $role = $this->repository->find($id);

            if (empty($role)) {
                return $this->output->unableToFindRole();
            }

            $this->repository->delete($id);
        } catch (\Throwable $e) {
            return $this->output->unableToDeleteRole($e);
        }

        return $this->output->roleDeleted(
            new DeleteRoleResponseModel($role)
        );
    }
}
