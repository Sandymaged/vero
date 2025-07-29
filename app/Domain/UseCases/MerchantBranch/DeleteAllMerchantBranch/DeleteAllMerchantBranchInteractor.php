<?php

namespace App\Domain\UseCases\MerchantBranch\DeleteAllMerchantBranch;


use App\Domain\Interfaces\Factories\IMerchantBranchFactory;
use App\Domain\Interfaces\IViewModel;
use App\Domain\Interfaces\Repositories\IMerchantBranchRepository;

class DeleteAllMerchantBranchInteractor implements IDeleteAllMerchantBranchInputPort
{

    private $output;
    private $repository;
    private $factory;

    public function __construct(
        IDeleteAllMerchantBranchOutputPort $output,
        IMerchantBranchRepository          $repository,
        IMerchantBranchFactory             $factory
    )
    {
        $this->output = $output;
        $this->repository = $repository;
        $this->factory = $factory;
    }

    public function deleteAllMerchantBranch(DeleteAllMerchantBranchRequestModel $request): IViewModel
    {

        try {
            $this->repository->deleteWhere([
                ['id', 'IN', $request->getIds()]
            ]);

        } catch (\Throwable $e) {
            return $this->output->unableToDeleteAllMerchantBranch($e);
        }

        return $this->output->merchantBranchesDeleted();
    }
}
