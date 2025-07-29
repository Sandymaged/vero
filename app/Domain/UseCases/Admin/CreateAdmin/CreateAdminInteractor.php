<?php

namespace App\Domain\UseCases\Admin\CreateAdmin;

use App\Domain\Interfaces\IViewModel;
use App\Domain\Interfaces\Repositories\IRoleRepository;

class CreateAdminInteractor implements ICreateAdminInputPort
{

    private $output;
    private $roleRepository;

    public function __construct(
        ICreateAdminOutputPort $output,
        IRoleRepository        $roleRepository
    )
    {
        $this->output = $output;
        $this->roleRepository = $roleRepository;
    }

    public function createAdmin(CreateAdminRequestModel $model): IViewModel
    {

        try {
            $roles = $this->roleRepository->pluck('name', 'id')->toArray();
        } catch (\Throwable $e) {
            return $this->output->error($e);
        }

        return $this->output->createAdmin(
            new CreateAdminResponseModel($roles)
        );
    }
}
