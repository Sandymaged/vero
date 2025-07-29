<?php

namespace App\Domain\UseCases\Admin\ListAdmin;

use App\Domain\Interfaces\IViewModel;
use App\Domain\Interfaces\Repositories\IRoleRepository;

class ListAdminInteractor implements IListAdminInputPort
{

    private $output;
    private $roleRepository;

    public function __construct(
        IListAdminOutputPort $output,
        IRoleRepository      $roleRepository
    )
    {
        $this->output = $output;
        $this->roleRepository = $roleRepository;
    }

    public function listAdmin(ListAdminRequestModel $model): IViewModel
    {
        try {
            $roles = $this->roleRepository->pluck('name', 'id')->prepend('','')->toArray();
        } catch (\Throwable $e) {
            return $this->output->error($e);
        }

        return $this->output->adminListed(
            new ListAdminResponseModel($roles)
        );
    }
}
