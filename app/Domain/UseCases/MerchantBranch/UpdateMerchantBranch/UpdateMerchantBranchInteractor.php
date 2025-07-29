<?php

namespace App\Domain\UseCases\MerchantBranch\UpdateMerchantBranch;

use App\Domain\Interfaces\Factories\IMerchantBranchFactory;
use App\Domain\Interfaces\IViewModel;
use App\Domain\Interfaces\Repositories\IMerchantBranchRepository;
use App\Models\Merchant;
use App\Models\MerchantBranch;
use App\Utiles\ImageManager;

class UpdateMerchantBranchInteractor implements IUpdateMerchantBranchInputPort
{

    private $output;
    private $repository;
    private $factory;

    public function __construct(
        IUpdateMerchantBranchOutputPort $output,
        IMerchantBranchRepository       $repository,
        IMerchantBranchFactory          $factory
    )
    {
        $this->output = $output;
        $this->repository = $repository;
        $this->factory = $factory;
    }

    public function updateMerchantBranch(int $id, UpdateMerchantBranchRequestModel $request): IViewModel
    {

        $attributes = [
            'name' => $request->getName(),
            'state_id' => $request->getStateId(),
            'merchant_id' => $request->getMerchantId(),
            'image' => ImageManager::upload(MerchantBranch::IMAGE_DIR . '/', 'png', $request->getImage()),
            'is_active' => $request->getIsActive(),
            'location' => $request->getLocation(),
            'responsible_name' => $request->getResponsibleName(),
            'responsible_phone' => $request->getResponsiblePhone(),
        ];

        if (!$request->getImageRemove() && !$request->getImage()) {
            unset($attributes['image']);
        }

        $merchantBranch = $this->factory->make($attributes);

        try {
            if (empty($this->repository->find($id))) {
                return $this->output->unableToFindMerchantBranch();
            }

            $this->repository->update($merchantBranch->toArray(), $id);
        } catch (\Throwable $e) {
            return $this->output->unableToUpdateMerchantBranch(new UpdateMerchantBranchResponseModel($merchantBranch), $e);
        }

        return $this->output->merchantBranchUpdated(
            new UpdateMerchantBranchResponseModel($merchantBranch)
        );
    }
}
