<?php

namespace App\Domain\UseCases\Permission\ListPermission;


use App\Domain\Interfaces\IViewModel;
use App\Domain\Interfaces\Repositories\ICategoryRepository;
use App\Domain\Interfaces\Repositories\IMerchantBranchRepository;
use App\Domain\Interfaces\Repositories\IMerchantRepository;
use App\Domain\Interfaces\Repositories\IPermissionRepository;

class ListPermissionInteractor implements IListPermissionInputPort
{

    private $output;
    private $repository;

    public function __construct(
        IListPermissionOutputPort      $output,
        IPermissionRepository          $repository
    )
    {
        $this->output = $output;
        $this->repository = $repository;
    }

    public function listPermission(ListPermissionRequestModel $model): IViewModel
    {
        try {
            $permissions = $this->repository->getLatest();
        } catch (\Throwable $e) {
            return $this->output->error($e);
        }

        return $this->output->permissionListed(
            new ListPermissionResponseModel($permissions)
        );
    }
}
