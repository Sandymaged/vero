<?php

namespace App\Domain\UseCases\MerchantUser\EditMerchantUser;

use App\Domain\Interfaces\Factories\IMerchantUserFactory;
use App\Domain\Interfaces\IViewModel;
use App\Domain\Interfaces\Repositories\IMerchantBranchRepository;
use App\Domain\Interfaces\Repositories\IMerchantUserRepository;
use App\Domain\Interfaces\Repositories\IMerchantRepository;
use App\Domain\Interfaces\Repositories\IStateRepository;

class EditMerchantUserInteractor implements IEditMerchantUserInputPort
{

    private $output;
    private $merchantRepository;
    private $merchantBranchRepository;
    private $repository;

    public function __construct(
        IEditMerchantUserOutputPort $output,
        IMerchantBranchRepository     $merchantBranchRepository,
        IMerchantRepository     $merchantRepository,
        IMerchantUserRepository     $repository
    )
    {
        $this->output = $output;
        $this->merchantBranchRepository = $merchantBranchRepository;
        $this->merchantRepository = $merchantRepository;
        $this->repository = $repository;
    }

    public function editMerchantUser(int $id, EditMerchantUserRequestModel $model): IViewModel
    {
        try {
            $merchantUser = $this->repository->find($id);

            if(empty($merchantUser)){
                return $this->output->unableToFindMerchantUser();
            }

            $merchantBranches = $this->merchantBranchRepository->pluck('name', 'id')->prepend('', '')->toArray();
            $merchants = $this->merchantRepository->pluck('name', 'id')->prepend('', '')->toArray();
        } catch (\Throwable $e) {
            return $this->output->error($e);
        }

        return $this->output->editMerchantUser(
            new EditMerchantUserResponseModel($merchantUser, $merchants, $merchantBranches)
        );
    }
}
