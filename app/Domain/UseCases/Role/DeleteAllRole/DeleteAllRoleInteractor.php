<?php

namespace App\Domain\UseCases\Role\DeleteAllRole;


use App\Domain\Interfaces\Factories\IRoleFactory;
use App\Domain\Interfaces\IViewModel;
use App\Domain\Interfaces\Repositories\IRoleRepository;

class DeleteAllRoleInteractor implements IDeleteAllRoleInputPort
{

    private $output;
    private $repository;
    private $factory;

    public function __construct(
        IDeleteAllRoleOutputPort $output,
        IRoleRepository          $repository,
        IRoleFactory             $factory
    )
    {
        $this->output = $output;
        $this->repository = $repository;
        $this->factory = $factory;
    }

    public function deleteAllRole(DeleteAllRoleRequestModel $request): IViewModel
    {

        try {
            $this->repository->deleteWhere([
                ['id', 'IN', $request->getIds()]
            ]);

        } catch (\Throwable $e) {
            return $this->output->unableToDeleteAllRole($e);
        }

        return $this->output->rolesDeleted();
    }
}
