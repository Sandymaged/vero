<?php

namespace App\Domain\UseCases\Merchant\StoreMerchant;

use App\Domain\Interfaces\Factories\IMerchantFactory;
use App\Domain\Interfaces\IViewModel;
use App\Domain\Interfaces\Repositories\IMerchantRepository;
use App\Models\Merchant;
use App\Utiles\ImageManager;

class StoreMerchantInteractor implements IStoreMerchantInputPort
{

    private $output;
    private $repository;
    private $factory;

    public function __construct(
        IStoreMerchantOutputPort $output,
        IMerchantRepository      $repository,
        IMerchantFactory         $factory
    )
    {
        $this->output = $output;
        $this->repository = $repository;
        $this->factory = $factory;
    }

    public function createMerchant(StoreMerchantRequestModel $request): IViewModel
    {
        $merchant = $this->factory->make([
            'name' => $request->getName(),
            'state_id' => $request->getStateId(),
            'image' => ImageManager::upload(Merchant::IMAGE_DIR . '/', 'png', $request->getImage()),
            'is_active' => $request->getIsActive(),
            'location' => $request->getLocation(),
            'deposit_percentage' => $request->getDepositPercentage(),
            'type' => $request->getType(),
            'logo' => ImageManager::upload(Merchant::IMAGE_DIR . '/', 'png', $request->getLogo()),
            'video_url' => $request->getVideoUrl(),
            'admin_name' => $request->getAdminName(),
            'reservations_responsible_name' => $request->getReservationsResponsibleName(),
            'admin_phone' => $request->getAdminPhone(),
            'reservations_responsible_phone' => $request->getReservationsResponsiblePhone(),
            'email' => $request->getEmail(),
        ]);

        try {
            $this->repository->create($merchant->toArray());
        } catch (\Throwable $e) {
            return $this->output->unableToStoreMerchant(new StoreMerchantResponseModel($merchant), $e);
        }

        return $this->output->merchantCreated(
            new StoreMerchantResponseModel($merchant)
        );
    }
}
