<?php

namespace App\Domain\UseCases\Role\ListRole;


use App\Domain\Interfaces\IViewModel;
use App\Domain\Interfaces\Repositories\ICategoryRepository;
use App\Domain\Interfaces\Repositories\IMerchantBranchRepository;
use App\Domain\Interfaces\Repositories\IMerchantRepository;
use App\Domain\Interfaces\Repositories\IRoleRepository;

class ListRoleInteractor implements IListRoleInputPort
{

    private $output;
    private $repository;

    public function __construct(
        IListRoleOutputPort      $output,
        IRoleRepository          $repository
    )
    {
        $this->output = $output;
        $this->repository = $repository;
    }

    public function listRole(ListRoleRequestModel $model): IViewModel
    {
        try {
            $roles = $this->repository->getLatest();
        } catch (\Throwable $e) {
            return $this->output->error($e);
        }

        return $this->output->roleListed(
            new ListRoleResponseModel($roles)
        );
    }
}
