<?php

namespace App\Domain\UseCases\Offer\CreateOffer;

use App\Domain\Interfaces\IViewModel;
use App\Domain\Interfaces\Repositories\ICategoryRepository;
use App\Domain\Interfaces\Repositories\IMerchantBranchRepository;
use App\Domain\Interfaces\Repositories\IOfferRepository;
use App\Domain\Interfaces\Repositories\IMerchantRepository;
use App\Domain\Interfaces\Repositories\IStateRepository;

class CreateOfferInteractor implements ICreateOfferInputPort
{

    private $output;
    private $merchantRepository;
    private $merchantBranchRepository;
    private $categoryRepository;

    public function __construct(
        ICreateOfferOutputPort $output,
        IMerchantBranchRepository     $merchantBranchRepository,
        IMerchantRepository     $merchantRepository,
        ICategoryRepository     $categoryRepository
    )
    {
        $this->output = $output;
        $this->merchantBranchRepository = $merchantBranchRepository;
        $this->merchantRepository = $merchantRepository;
        $this->categoryRepository = $categoryRepository;
    }

    public function createOffer(CreateOfferRequestModel $model): IViewModel
    {
        try {
            $merchantBranches = $this->merchantBranchRepository->pluck('name', 'id')->prepend('', '')->toArray();
            $merchants = $this->merchantRepository->pluck('name', 'id')->prepend('', '')->toArray();
            $categories = $this->categoryRepository->pluck('name', 'id')->prepend('', '')->toArray();
        } catch (\Throwable $e) {
            return $this->output->error($e);
        }

        return $this->output->createOffer(
            new CreateOfferResponseModel($merchants, $merchantBranches, $categories)
        );
    }
}
