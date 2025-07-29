<?php

namespace App\Domain\UseCases\Admin\DeleteAllAdmin;


use App\Domain\Interfaces\Factories\IAdminFactory;
use App\Domain\Interfaces\IViewModel;
use App\Domain\Interfaces\Repositories\IAdminRepository;

class DeleteAllAdminInteractor implements IDeleteAllAdminInputPort
{

    private $output;
    private $repository;
    private $factory;

    public function __construct(
        IDeleteAllAdminOutputPort $output,
        IAdminRepository          $repository,
        IAdminFactory             $factory
    )
    {
        $this->output = $output;
        $this->repository = $repository;
        $this->factory = $factory;
    }

    public function deleteAllAdmin(DeleteAllAdminRequestModel $request): IViewModel
    {

        try {
            $this->repository->deleteWhere([
                ['id', 'IN', $request->getIds()]
            ]);

        } catch (\Throwable $e) {
            return $this->output->unableToDeleteAllAdmin($e);
        }

        return $this->output->adminsDeleted();
    }
}
