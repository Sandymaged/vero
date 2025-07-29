<?php

namespace App\Domain\UseCases\MerchantBranch\StoreMerchantBranch;

use App\Domain\Interfaces\Factories\IMerchantBranchFactory;
use App\Domain\Interfaces\IViewModel;
use App\Domain\Interfaces\Repositories\IMerchantBranchRepository;
use App\Models\MerchantBranch;
use App\Utiles\ImageManager;

class StoreMerchantBranchInteractor implements IStoreMerchantBranchInputPort
{

    private $output;
    private $repository;
    private $factory;

    public function __construct(
        IStoreMerchantBranchOutputPort $output,
        IMerchantBranchRepository       $repository,
        IMerchantBranchFactory          $factory
    )
    {
        $this->output = $output;
        $this->repository = $repository;
        $this->factory = $factory;
    }

    public function createMerchantBranch(StoreMerchantBranchRequestModel $request): IViewModel
    {
        $merchantBranch = $this->factory->make([
            'name' => $request->getName(),
            'state_id' => $request->getStateId(),
            'merchant_id' => $request->getMerchantId(),
            'image' => ImageManager::upload(MerchantBranch::IMAGE_DIR . '/', 'png', $request->getImage()),
            'is_active' => $request->getIsActive(),
            'location' => $request->getLocation(),
            'responsible_name' => $request->getResponsibleName(),
            'responsible_phone' => $request->getResponsiblePhone(),
        ]);

        try {
            $this->repository->create($merchantBranch->toArray());
        } catch (\Throwable $e) {
            return $this->output->unableToStoreMerchantBranch(new StoreMerchantBranchResponseModel($merchantBranch), $e);
        }

        return $this->output->merchantBranchCreated(
            new StoreMerchantBranchResponseModel($merchantBranch)
        );
    }
}
