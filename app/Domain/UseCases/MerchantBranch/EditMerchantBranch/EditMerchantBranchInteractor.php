<?php

namespace App\Domain\UseCases\MerchantBranch\EditMerchantBranch;

use App\Domain\Interfaces\Factories\IMerchantBranchFactory;
use App\Domain\Interfaces\IViewModel;
use App\Domain\Interfaces\Repositories\IMerchantBranchRepository;
use App\Domain\Interfaces\Repositories\IMerchantRepository;
use App\Domain\Interfaces\Repositories\IStateRepository;

class EditMerchantBranchInteractor implements IEditMerchantBranchInputPort
{

    private $output;
    private $stateRepository;
    private $merchantRepository;
    private $repository;

    public function __construct(
        IEditMerchantBranchOutputPort $output,
        IStateRepository     $stateRepository,
        IMerchantRepository     $merchantRepository,
        IMerchantBranchRepository     $repository
    )
    {
        $this->output = $output;
        $this->stateRepository = $stateRepository;
        $this->merchantRepository = $merchantRepository;
        $this->repository = $repository;
    }

    public function editMerchantBranch(int $id, EditMerchantBranchRequestModel $model): IViewModel
    {

        try {
            $merchantBranch = $this->repository->find($id);

            if(empty($merchantBranch)){
                return $this->output->unableToFindMerchantBranch();
            }

            $merchants = $this->merchantRepository->pluck('name', 'id')->prepend('', '')->toArray();
            $states = $this->stateRepository->pluck('name', 'id')->prepend('', '')->toArray();
        } catch (\Throwable $e) {
            return $this->output->error($e);
        }

        return $this->output->editMerchantBranch(
            new EditMerchantBranchResponseModel($merchantBranch, $merchants, $states)
        );
    }
}
