<?php

namespace App\Domain\UseCases\Admin\EditAdmin;

use App\Domain\Interfaces\Factories\IStateFactory;
use App\Domain\Interfaces\IViewModel;
use App\Domain\Interfaces\Repositories\IAdminRepository;
use App\Domain\Interfaces\Repositories\IRoleRepository;

class EditAdminInteractor implements IEditAdminInputPort
{

    private $output;
    private $repository;
    private $roleRepository;

    public function __construct(
        IEditAdminOutputPort $output,
        IAdminRepository     $repository,
        IRoleRepository      $roleRepository
    )
    {
        $this->output = $output;
        $this->repository = $repository;
        $this->roleRepository = $roleRepository;
    }

    public function editAdmin(int $id, EditAdminRequestModel $model): IViewModel
    {

        try {
            $admin = $this->repository->find($id);

            if(empty($admin)){
                return $this->output->unableToFindAdmin();
            }

            $roles = $this->roleRepository->pluck('name', 'id')->toArray();
        } catch (\Throwable $e) {
            return $this->output->error($e);
        }

        return $this->output->editAdmin(
            new EditAdminResponseModel($admin, $roles)
        );
    }
}
