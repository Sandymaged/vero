<?php

namespace App\Domain\UseCases\MerchantUser\ListMerchantUser;

use App\Domain\Interfaces\IViewModel;
use App\Domain\Interfaces\Repositories\IMerchantBranchRepository;
use App\Domain\Interfaces\Repositories\IMerchantRepository;
use App\Domain\Interfaces\Repositories\IMerchantUserRepository;

class ListMerchantUserInteractor implements IListMerchantUserInputPort
{

    private $output;
    private $repository;

    public function __construct(
        IListMerchantUserOutputPort $output,
        IMerchantUserRepository     $repository
    )
    {
        $this->output = $output;
        $this->repository = $repository;
    }

    public function listMerchantUser(ListMerchantUserRequestModel $model): IViewModel
    {
        try {
            $merchantUsers = $this->repository->getLatest();
        } catch (\Throwable $e) {
            return $this->output->error($e);
        }

        return $this->output->merchantUserListed(
            new ListMerchantUserResponseModel( $merchantUsers)
        );
    }
}
