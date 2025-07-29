<?php

namespace App\Domain\UseCases\Offer\EditOffer;

use App\Domain\Interfaces\Factories\IOfferFactory;
use App\Domain\Interfaces\IViewModel;
use App\Domain\Interfaces\Repositories\ICategoryRepository;
use App\Domain\Interfaces\Repositories\IMerchantBranchRepository;
use App\Domain\Interfaces\Repositories\IMerchantRepository;
use App\Domain\Interfaces\Repositories\IOfferRepository;

class EditOfferInteractor implements IEditOfferInputPort
{

    private $output;
    private $merchantRepository;
    private $merchantBranchRepository;
    private $categoryRepository;
    private $repository;

    public function __construct(
        IEditOfferOutputPort      $output,
        IMerchantBranchRepository $merchantBranchRepository,
        IMerchantRepository       $merchantRepository,
        ICategoryRepository       $categoryRepository,
        IOfferRepository          $repository
    )
    {
        $this->output = $output;
        $this->merchantBranchRepository = $merchantBranchRepository;
        $this->merchantRepository = $merchantRepository;
        $this->categoryRepository = $categoryRepository;
        $this->repository = $repository;
    }

    public function editOffer(int $id, EditOfferRequestModel $model): IViewModel
    {
        try {
            $offer = $this->repository->find($id);

            if(empty($offer)){
                return $this->output->unableToFindOffer();
            }

            $merchantBranches = $this->merchantBranchRepository->pluck('name', 'id')->prepend('', '')->toArray();
            $merchants = $this->merchantRepository->pluck('name', 'id')->prepend('', '')->toArray();
            $categories = $this->categoryRepository->pluck('name', 'id')->prepend('', '')->toArray();
        } catch (\Throwable $e) {
            return $this->output->error($e);
        }

        return $this->output->editOffer(
            new EditOfferResponseModel($offer, $merchants, $merchantBranches, $categories)
        );
    }
}
