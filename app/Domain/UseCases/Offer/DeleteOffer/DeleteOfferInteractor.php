<?php

namespace App\Domain\UseCases\Offer\DeleteOffer;


use App\Domain\Interfaces\Factories\IOfferFactory;
use App\Domain\Interfaces\IViewModel;
use App\Domain\Interfaces\Repositories\IOfferRepository;

class DeleteOfferInteractor implements IDeleteOfferInputPort
{

    private $output;
    private $repository;
    private $factory;

    public function __construct(
        IDeleteOfferOutputPort $output,
        IOfferRepository       $repository,
        IOfferFactory          $factory
    )
    {
        $this->output = $output;
        $this->repository = $repository;
        $this->factory = $factory;
    }

    public function deleteOffer(int $id, DeleteOfferRequestModel $request): IViewModel
    {

        try {
            $offer = $this->repository->find($id);

            if (empty($offer)) {
                return $this->output->unableToFindOffer();
            }

            $this->repository->delete($id);
        } catch (\Throwable $e) {
            return $this->output->unableToDeleteOffer($e);
        }

        return $this->output->offerDeleted(
            new DeleteOfferResponseModel($offer)
        );
    }
}
