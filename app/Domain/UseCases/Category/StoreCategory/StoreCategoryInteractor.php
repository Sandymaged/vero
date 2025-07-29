<?php

namespace App\Domain\UseCases\Category\StoreCategory;

use App\Domain\Interfaces\Factories\ICategoryFactory;
use App\Domain\Interfaces\Factories\ISubcategoryFactory;
use App\Domain\Interfaces\IViewModel;
use App\Domain\Interfaces\Repositories\ICategoryRepository;
use App\Domain\Interfaces\Repositories\ISubcategoryRepository;
use App\Models\Category;
use App\Utiles\ImageManager;
use App\ValueObjects\PasswordValueObject;

class StoreCategoryInteractor implements IStoreCategoryInputPort
{

    private $output;
    private $repository;
    private $factory;
    private $subcategoryFactory;
    private $subcategoryRepository;

    public function __construct(
        IStoreCategoryOutputPort $output,
        ICategoryRepository       $repository,
        ICategoryFactory          $factory,
        ISubcategoryFactory          $subcategoryFactory,
        ISubcategoryRepository       $subcategoryRepository
    )
    {
        $this->output = $output;
        $this->repository = $repository;
        $this->factory = $factory;
        $this->subcategoryFactory = $subcategoryFactory;
        $this->subcategoryRepository = $subcategoryRepository;
    }

    public function createCategory(StoreCategoryRequestModel $request): IViewModel
    {
        $category = $this->factory->make([
            'name' => $request->getName(),
            'state_id' => $request->getStateId(),
            'parent_id' => null,
            'is_service' => 0,
            'is_active' => $request->getIsActive(),
        ]);

        try {
            $category = $this->repository->create($category->toArray());

            if ($request->getSubcategories()) {
                foreach ($request->getSubcategories() as $subcategory) {
                    $subcategory = $this->subcategoryFactory->make([
                        'name' => $subcategory['name'],
                        'is_active' => $subcategory['is_active'],
                        'is_service' => 0,
                        'state_id' => $request->getStateId(),
                        'parent_id' => $category->id
                    ]);

                    $this->subcategoryRepository->create($subcategory->toArray());
                }
            }

        } catch (\Throwable $e) {
            return $this->output->unableToStoreCategory(new StoreCategoryResponseModel($category), $e);
        }

        return $this->output->categoryCreated(
            new StoreCategoryResponseModel($category)
        );
    }
}
