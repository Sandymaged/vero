<?php

namespace App\Domain\UseCases\Offer\DeleteAllOffer;


use App\Domain\Interfaces\Factories\IOfferFactory;
use App\Domain\Interfaces\IViewModel;
use App\Domain\Interfaces\Repositories\IOfferRepository;

class DeleteAllOfferInteractor implements IDeleteAllOfferInputPort
{

    private $output;
    private $repository;
    private $factory;

    public function __construct(
        IDeleteAllOfferOutputPort $output,
        IOfferRepository          $repository,
        IOfferFactory             $factory
    )
    {
        $this->output = $output;
        $this->repository = $repository;
        $this->factory = $factory;
    }

    public function deleteAllOffer(DeleteAllOfferRequestModel $request): IViewModel
    {

        try {
            $this->repository->deleteWhere([
                ['id', 'IN', $request->getIds()]
            ]);

        } catch (\Throwable $e) {
            return $this->output->unableToDeleteAllOffer($e);
        }

        return $this->output->offersDeleted();
    }
}
