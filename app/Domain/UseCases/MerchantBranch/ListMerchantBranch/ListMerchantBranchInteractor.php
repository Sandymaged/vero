<?php

namespace App\Domain\UseCases\MerchantBranch\ListMerchantBranch;

use App\Domain\Interfaces\IViewModel;
use App\Domain\Interfaces\Repositories\IMerchantBranchRepository;
use App\Domain\Interfaces\Repositories\IMerchantRepository;
use App\Domain\Interfaces\Repositories\IStateRepository;

class ListMerchantBranchInteractor implements IListMerchantBranchInputPort
{

    private $output;
    private $repository;

    public function __construct(
        IListMerchantBranchOutputPort $output,
        IMerchantBranchRepository     $repository
    )
    {
        $this->output = $output;
        $this->repository = $repository;

    }

    public function listMerchantBranch(ListMerchantBranchRequestModel $model): IViewModel
    {
        try {
            $merchantBranches = $this->repository->getLatest();
        } catch (\Throwable $e) {
            return $this->output->error($e);
        }

        return $this->output->merchantBranchListed(
            new ListMerchantBranchResponseModel($merchantBranches)
        );
    }
}
