<?php

namespace App\Domain\UseCases\Offer\ListOffer;


use App\Domain\Interfaces\IViewModel;
use App\Domain\Interfaces\Repositories\ICategoryRepository;
use App\Domain\Interfaces\Repositories\IMerchantBranchRepository;
use App\Domain\Interfaces\Repositories\IMerchantRepository;
use App\Domain\Interfaces\Repositories\IOfferRepository;

class ListOfferInteractor implements IListOfferInputPort
{

    private $output;
    private $repository;

    public function __construct(
        IListOfferOutputPort      $output,
        IOfferRepository          $repository
    )
    {
        $this->output = $output;
        $this->repository = $repository;
    }

    public function listOffer(ListOfferRequestModel $model): IViewModel
    {
        try {
            $offers = $this->repository->getLatest();
        } catch (\Throwable $e) {
            return $this->output->error($e);
        }

        return $this->output->offerListed(
            new ListOfferResponseModel($offers)
        );
    }
}
