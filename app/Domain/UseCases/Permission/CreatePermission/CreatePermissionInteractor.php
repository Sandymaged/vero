<?php

namespace App\Domain\UseCases\Permission\CreatePermission;

use App\Domain\Interfaces\IViewModel;
use App\Domain\Interfaces\Repositories\ICategoryRepository;
use App\Domain\Interfaces\Repositories\IMerchantBranchRepository;
use App\Domain\Interfaces\Repositories\IPermissionRepository;
use App\Domain\Interfaces\Repositories\IMerchantRepository;
use App\Domain\Interfaces\Repositories\IStateRepository;

class CreatePermissionInteractor implements ICreatePermissionInputPort
{

    private $output;

    public function __construct(
        ICreatePermissionOutputPort $output
    )
    {
        $this->output = $output;
    }

    public function createPermission(CreatePermissionRequestModel $model): IViewModel
    {
        return $this->output->createPermission(
            new CreatePermissionResponseModel()
        );
    }
}
