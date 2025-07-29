<?php

namespace App\Domain\UseCases\Subcategory\UpdateSubcategory;

use App\Domain\Interfaces\Factories\ISubcategoryFactory;
use App\Domain\Interfaces\IViewModel;
use App\Domain\Interfaces\Repositories\ISubcategoryRepository;
use App\Models\Subcategory;
use App\Utiles\ImageManager;
use App\ValueObjects\PasswordValueObject;

class UpdateSubcategoryInteractor implements IUpdateSubcategoryInputPort
{

    private $output;
    private $repository;
    private $factory;

    public function __construct(
        IUpdateSubcategoryOutputPort $output,
        ISubcategoryRepository       $repository,
        ISubcategoryFactory          $factory
    )
    {
        $this->output = $output;
        $this->repository = $repository;
        $this->factory = $factory;
    }

    public function updateSubcategory(int $id, UpdateSubcategoryRequestModel $request): IViewModel
    {
        $subcategory = $this->factory->make([
            'name' => $request->getName(),
            'state_id' => $request->getStateId(),
            'parent_id' => $request->getParentId(),
//            'is_service' => $request->getIsService(),
            'is_active' => $request->getIsActive(),
        ]);

        try {

            if (empty($this->repository->find($id))) {
                return $this->output->unableToFindSubcategory();
            }

            $this->repository->update($subcategory->toArray(), $id);
        } catch (\Throwable $e) {
            return $this->output->unableToUpdateSubcategory(new UpdateSubcategoryResponseModel($subcategory), $e);
        }

        return $this->output->subcategoryUpdated(
            new UpdateSubcategoryResponseModel($subcategory)
        );
    }
}
