<?php

namespace App\Domain\UseCases\Offer\UpdateOffer;

use App\Domain\Interfaces\Factories\IOfferFactory;
use App\Domain\Interfaces\IViewModel;
use App\Domain\Interfaces\Repositories\IOfferRepository;
use App\Models\MerchantUser;
use App\Models\Offer;
use App\Utiles\ImageManager;
use App\ValueObjects\PasswordValueObject;

class UpdateOfferInteractor implements IUpdateOfferInputPort
{

    private $output;
    private $repository;
    private $factory;

    public function __construct(
        IUpdateOfferOutputPort $output,
        IOfferRepository       $repository,
        IOfferFactory          $factory
    )
    {
        $this->output = $output;
        $this->repository = $repository;
        $this->factory = $factory;
    }

    public function updateOffer(int $id, UpdateOfferRequestModel $request): IViewModel
    {

        $attributes = [
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
        ];

        if (!$request->getImageRemove() && !$request->getImage()) {
            unset($attributes['image']);
        }

        $offer = $this->factory->make($attributes);

        try {
            if (empty($this->repository->find($id))) {
                return $this->output->unableToFindOffer();
            }

            $this->repository->update($offer->toArray(), $id);
        } catch (\Throwable $e) {
            return $this->output->unableToUpdateOffer(new UpdateOfferResponseModel($offer), $e);
        }

        return $this->output->offerUpdated(
            new UpdateOfferResponseModel($offer)
        );
    }
}
