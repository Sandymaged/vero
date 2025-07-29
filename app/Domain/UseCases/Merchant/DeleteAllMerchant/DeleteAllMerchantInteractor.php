<?php

namespace App\Domain\UseCases\Merchant\DeleteAllMerchant;


use App\Domain\Interfaces\Factories\IMerchantFactory;
use App\Domain\Interfaces\IViewModel;
use App\Domain\Interfaces\Repositories\IMerchantRepository;

class DeleteAllMerchantInteractor implements IDeleteAllMerchantInputPort
{

    private $output;
    private $repository;
    private $factory;

    public function __construct(
        IDeleteAllMerchantOutputPort $output,
        IMerchantRepository          $repository,
        IMerchantFactory             $factory
    )
    {
        $this->output = $output;
        $this->repository = $repository;
        $this->factory = $factory;
    }

    public function deleteAllMerchant(DeleteAllMerchantRequestModel $request): IViewModel
    {

        try {
            $this->repository->deleteWhere([
                ['id', 'IN', $request->getIds()]
            ]);

        } catch (\Throwable $e) {
            return $this->output->unableToDeleteAllMerchant($e);
        }

        return $this->output->merchantsDeleted();
    }
}
