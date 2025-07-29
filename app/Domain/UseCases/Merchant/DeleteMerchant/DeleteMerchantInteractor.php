<?php

namespace App\Domain\UseCases\Merchant\DeleteMerchant;


use App\Domain\Interfaces\Factories\IMerchantFactory;
use App\Domain\Interfaces\IViewModel;
use App\Domain\Interfaces\Repositories\IMerchantRepository;

class DeleteMerchantInteractor implements IDeleteMerchantInputPort
{

    private $output;
    private $repository;
    private $factory;

    public function __construct(
        IDeleteMerchantOutputPort $output,
        IMerchantRepository       $repository,
        IMerchantFactory          $factory
    )
    {
        $this->output = $output;
        $this->repository = $repository;
        $this->factory = $factory;
    }

    public function deleteMerchant(int $id, DeleteMerchantRequestModel $request): IViewModel
    {

        try {
            $merchant = $this->repository->find($id);

            if (empty($merchant)) {
                return $this->output->unableToFindMerchant();
            }

            $this->repository->delete($id);
        } catch (\Throwable $e) {
            return $this->output->unableToDeleteMerchant($e);
        }

        return $this->output->merchantDeleted(
            new DeleteMerchantResponseModel($merchant)
        );
    }
}
