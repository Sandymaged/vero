<?php

namespace App\Domain\UseCases\MerchantBranch\CreateMerchantBranch;

use App\Domain\Interfaces\IViewModel;
use App\Domain\Interfaces\Repositories\IMerchantBranchRepository;
use App\Domain\Interfaces\Repositories\IMerchantRepository;
use App\Domain\Interfaces\Repositories\IStateRepository;

class CreateMerchantBranchInteractor implements ICreateMerchantBranchInputPort
{

    private $output;
    private $stateRepository;
    private $merchantRepository;

    public function __construct(
        ICreateMerchantBranchOutputPort $output,
        IStateRepository     $stateRepository,
        IMerchantRepository     $merchantRepository
    )
    {
        $this->output = $output;
        $this->stateRepository = $stateRepository;
        $this->merchantRepository = $merchantRepository;
    }

    public function createMerchantBranch(CreateMerchantBranchRequestModel $model): IViewModel
    {

        try {
            $merchants = $this->merchantRepository->pluck('name', 'id')->prepend('', '')->toArray();
            $states = $this->stateRepository->pluck('name', 'id')->prepend('', '')->toArray();
        } catch (\Throwable $e) {
            return $this->output->error($e);
        }

        return $this->output->createMerchantBranch(
            new CreateMerchantBranchResponseModel($merchants, $states)
        );
    }
}
