<?php

namespace App\Domain\UseCases\MerchantUser\CreateMerchantUser;

use App\Domain\Interfaces\IViewModel;
use App\Domain\Interfaces\Repositories\IMerchantBranchRepository;
use App\Domain\Interfaces\Repositories\IMerchantUserRepository;
use App\Domain\Interfaces\Repositories\IMerchantRepository;
use App\Domain\Interfaces\Repositories\IStateRepository;

class CreateMerchantUserInteractor implements ICreateMerchantUserInputPort
{

    private $output;
    private $merchantRepository;
    private $merchantBranchRepository;

    public function __construct(
        ICreateMerchantUserOutputPort $output,
        IMerchantBranchRepository     $merchantBranchRepository,
        IMerchantRepository     $merchantRepository
    )
    {
        $this->output = $output;
        $this->merchantBranchRepository = $merchantBranchRepository;
        $this->merchantRepository = $merchantRepository;
    }

    public function createMerchantUser(CreateMerchantUserRequestModel $model): IViewModel
    {

        try {
            $merchantBranches = $this->merchantBranchRepository->pluck('name', 'id')->prepend('', '')->toArray();
            $merchants = $this->merchantRepository->pluck('name', 'id')->prepend('', '')->toArray();
        } catch (\Throwable $e) {
            return $this->output->error($e);
        }

        return $this->output->createMerchantUser(
            new CreateMerchantUserResponseModel($merchants, $merchantBranches)
        );
    }
}
