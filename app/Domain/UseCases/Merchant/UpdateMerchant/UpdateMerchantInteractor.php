<?php

namespace App\Domain\UseCases\Merchant\UpdateMerchant;

use App\Domain\Interfaces\Factories\IMerchantFactory;
use App\Domain\Interfaces\IViewModel;
use App\Domain\Interfaces\Repositories\IMerchantRepository;
use App\Models\Admin;
use App\Models\Merchant;
use App\Utiles\ImageManager;

class UpdateMerchantInteractor implements IUpdateMerchantInputPort
{

    private $output;
    private $repository;
    private $factory;

    public function __construct(
        IUpdateMerchantOutputPort $output,
        IMerchantRepository      $repository,
        IMerchantFactory         $factory
    )
    {
        $this->output = $output;
        $this->repository = $repository;
        $this->factory = $factory;
    }

    public function updateMerchant(int $id, UpdateMerchantRequestModel $request): IViewModel
    {
        $attributes = [
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
        ];

        if (!$request->getImageRemove() && !$request->getImage()) {
            unset($attributes['image']);
        }

        if (!$request->getLogoRemove() && !$request->getLogo()) {
            unset($attributes['logo']);
        }

        $merchant = $this->factory->make($attributes);

        try {
            if (empty($this->repository->find($id))) {
                return $this->output->unableToFindMerchant();
            }

            $this->repository->update($merchant->toArray(), $id);
        } catch (\Throwable $e) {
            return $this->output->unableToUpdateMerchant(new UpdateMerchantResponseModel($merchant), $e);
        }

        return $this->output->merchantUpdated(
            new UpdateMerchantResponseModel($merchant)
        );
    }
}
