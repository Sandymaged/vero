<?php

namespace App\Domain\UseCases\Subcategory\StoreSubcategory;

use App\Domain\Interfaces\Factories\ISubcategoryFactory;
use App\Domain\Interfaces\IViewModel;
use App\Domain\Interfaces\Repositories\ISubcategoryRepository;
use App\Models\Subcategory;
use App\Utiles\ImageManager;
use App\ValueObjects\PasswordValueObject;

class StoreSubcategoryInteractor implements IStoreSubcategoryInputPort
{

    private $output;
    private $repository;
    private $factory;

    public function __construct(
        IStoreSubcategoryOutputPort $output,
        ISubcategoryRepository       $repository,
        ISubcategoryFactory          $factory
    )
    {
        $this->output = $output;
        $this->repository = $repository;
        $this->factory = $factory;
    }

    public function createSubcategory(StoreSubcategoryRequestModel $request): IViewModel
    {
        $subcategory = $this->factory->make([
            'name' => $request->getName(),
            'state_id' => $request->getStateId(),
            'parent_id' => $request->getParentId(),
            'is_service' => 0,
            'is_active' => $request->getIsActive(),
        ]);

        try {
            $this->repository->create($subcategory->toArray());
        } catch (\Throwable $e) {
            return $this->output->unableToStoreSubcategory(new StoreSubcategoryResponseModel($subcategory), $e);
        }

        return $this->output->subcategoryCreated(
            new StoreSubcategoryResponseModel($subcategory)
        );
    }
}
