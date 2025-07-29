<?php

namespace App\Domain\UseCases\Admin\DeleteAdmin;


use App\Domain\Interfaces\Factories\IAdminFactory;
use App\Domain\Interfaces\IViewModel;
use App\Domain\Interfaces\Repositories\IAdminRepository;

class DeleteAdminInteractor implements IDeleteAdminInputPort
{

    private $output;
    private $repository;
    private $factory;

    public function __construct(
        IDeleteAdminOutputPort $output,
        IAdminRepository       $repository,
        IAdminFactory          $factory
    )
    {
        $this->output = $output;
        $this->repository = $repository;
        $this->factory = $factory;
    }

    public function deleteAdmin(int $id, DeleteAdminRequestModel $request): IViewModel
    {

        try {
            $admin = $this->repository->find($id);

            if (empty($admin)) {
                return $this->output->unableToFindAdmin();
            }

            $this->repository->delete($id);
        } catch (\Throwable $e) {
            return $this->output->unableToDeleteAdmin($e);
        }

        return $this->output->adminDeleted(
            new DeleteAdminResponseModel($admin)
        );
    }
}
