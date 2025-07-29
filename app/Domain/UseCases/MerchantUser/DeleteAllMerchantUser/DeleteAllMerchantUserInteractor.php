<?php

namespace App\Domain\UseCases\MerchantUser\DeleteAllMerchantUser;


use App\Domain\Interfaces\Factories\IMerchantUserFactory;
use App\Domain\Interfaces\IViewModel;
use App\Domain\Interfaces\Repositories\IMerchantUserRepository;

class DeleteAllMerchantUserInteractor implements IDeleteAllMerchantUserInputPort
{

    private $output;
    private $repository;
    private $factory;

    public function __construct(
        IDeleteAllMerchantUserOutputPort $output,
        IMerchantUserRepository          $repository,
        IMerchantUserFactory             $factory
    )
    {
        $this->output = $output;
        $this->repository = $repository;
        $this->factory = $factory;
    }

    public function deleteAllMerchantUser(DeleteAllMerchantUserRequestModel $request): IViewModel
    {

        try {
            $this->repository->deleteWhere([
                ['id', 'IN', $request->getIds()]
            ]);

        } catch (\Throwable $e) {
            return $this->output->unableToDeleteAllMerchantUser($e);
        }

        return $this->output->merchantUsersDeleted();
    }
}
