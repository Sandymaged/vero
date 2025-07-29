<?php

namespace App\Domain\UseCases\MerchantBranch\DeleteMerchantBranch;


use App\Domain\Interfaces\Factories\IMerchantBranchFactory;
use App\Domain\Interfaces\IViewModel;
use App\Domain\Interfaces\Repositories\IMerchantBranchRepository;

class DeleteMerchantBranchInteractor implements IDeleteMerchantBranchInputPort
{

    private $output;
    private $repository;
    private $factory;

    public function __construct(
        IDeleteMerchantBranchOutputPort $output,
        IMerchantBranchRepository       $repository,
        IMerchantBranchFactory          $factory
    )
    {
        $this->output = $output;
        $this->repository = $repository;
        $this->factory = $factory;
    }

    public function deleteMerchantBranch(int $id, DeleteMerchantBranchRequestModel $request): IViewModel
    {

        try {
            $merchantBranch = $this->repository->find($id);

            if (empty($merchantBranch)) {
                return $this->output->unableToFindMerchantBranch();
            }

            $this->repository->delete($id);
        } catch (\Throwable $e) {
            return $this->output->unableToDeleteMerchantBranch($e);
        }

        return $this->output->merchantBranchDeleted(
            new DeleteMerchantBranchResponseModel($merchantBranch)
        );
    }
}
