<?php

namespace App\Domain\UseCases\Offer\StoreOffer;

use App\Domain\Interfaces\Factories\IOfferFactory;
use App\Domain\Interfaces\IViewModel;
use App\Domain\Interfaces\Repositories\IOfferRepository;
use App\Models\Offer;
use App\Utiles\ImageManager;
use App\ValueObjects\PasswordValueObject;

class StoreOfferInteractor implements IStoreOfferInputPort
{

    private $output;
    private $repository;
    private $factory;

    public function __construct(
        IStoreOfferOutputPort $output,
        IOfferRepository       $repository,
        IOfferFactory          $factory
    )
    {
        $this->output = $output;
        $this->repository = $repository;
        $this->factory = $factory;
    }

    public function createOffer(StoreOfferRequestModel $request): IViewModel
    {
        $offer = $this->factory->make([
            'category_id' => $request->getCategoryId(),
            'subcategory_id' => $request->getSubcategoryId(),
            'service_id' => $request->getServiceId(),
            'price' => $request->getPrice(),
            'application_percentage' => $request->getApplicationPercentage(),
            'extra_details' => $request->getExtraDetails(),
            'notes' => $request->getNotes(),
            'type' => $request->getType(),
            'video_url' => $request->getVideoUrl(),
            'name' => $request->getName(),
            'merchant_id' => $request->getMerchantId(),
            'merchant_branch_id' => $request->getMerchantBranchId(),
            'image' => ImageManager::upload(Offer::IMAGE_DIR.'/', 'png', $request->getImage()),
            'is_active' => $request->getIsActive(),
        ]);

        try {
            $this->repository->create($offer->toArray());
        } catch (\Throwable $e) {
            return $this->output->unableToStoreOffer(new StoreOfferResponseModel($offer), $e);
        }

        return $this->output->offerCreated(
            new StoreOfferResponseModel($offer)
        );
    }
}
