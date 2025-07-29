<?php

namespace App\Domain\UseCases\MerchantUser\DeleteMerchantUser;


use App\Domain\Interfaces\Factories\IMerchantUserFactory;
use App\Domain\Interfaces\IViewModel;
use App\Domain\Interfaces\Repositories\IMerchantUserRepository;

class DeleteMerchantUserInteractor implements IDeleteMerchantUserInputPort
{

    private $output;
    private $repository;
    private $factory;

    public function __construct(
        IDeleteMerchantUserOutputPort $output,
        IMerchantUserRepository       $repository,
        IMerchantUserFactory          $factory
    )
    {
        $this->output = $output;
        $this->repository = $repository;
        $this->factory = $factory;
    }

    public function deleteMerchantUser(int $id, DeleteMerchantUserRequestModel $request): IViewModel
    {

        try {
            $merchantUser = $this->repository->find($id);

            if (empty($merchantUser)) {
                return $this->output->unableToFindMerchantUser();
            }

            $this->repository->delete($id);
        } catch (\Throwable $e) {
            return $this->output->unableToDeleteMerchantUser($e);
        }

        return $this->output->merchantUserDeleted(
            new DeleteMerchantUserResponseModel($merchantUser)
        );
    }
}
