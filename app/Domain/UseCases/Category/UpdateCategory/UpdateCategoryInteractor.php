<?php

namespace App\Domain\UseCases\Category\UpdateCategory;

use App\Domain\Interfaces\Factories\ICategoryFactory;
use App\Domain\Interfaces\Factories\ISubcategoryFactory;
use App\Domain\Interfaces\IViewModel;
use App\Domain\Interfaces\Repositories\ICategoryRepository;
use App\Domain\Interfaces\Repositories\ISubcategoryRepository;

class UpdateCategoryInteractor implements IUpdateCategoryInputPort
{

    private $output;
    private $repository;
    private $factory;
    private $subcategoryFactory;
    private $subcategoryRepository;

    public function __construct(
        IUpdateCategoryOutputPort $output,
        ICategoryRepository       $repository,
        ICategoryFactory          $factory,
        ISubcategoryFactory       $subcategoryFactory,
        ISubcategoryRepository    $subcategoryRepository
    )
    {
        $this->output = $output;
        $this->repository = $repository;
        $this->factory = $factory;
        $this->subcategoryFactory = $subcategoryFactory;
        $this->subcategoryRepository = $subcategoryRepository;
    }

    public function updateCategory(int $id, UpdateCategoryRequestModel $request): IViewModel
    {
        $category = $this->factory->make([
            'name' => $request->getName(),
            'state_id' => $request->getStateId(),
            'parent_id' => null,
//            'is_service' => $request->getIsService(),
            'is_active' => $request->getIsActive(),
        ]);

        try {

            if (empty($this->repository->find($id))) {
                return $this->output->unableToFindCategory();
            }

            $this->repository->update($category->toArray(), $id);

            $subcategoriesIdsForNotDelete = [];
            if ($request->getSubcategories()) {
                foreach ($request->getSubcategories() as $subcategory) {
                    $subcategoryModel = $this->subcategoryFactory->make([
                        'name' => $subcategory['name'],
                        'is_active' => $subcategory['is_active'],
                        'is_service' => 0,
                        'state_id' => $request->getStateId(),
                        'parent_id' => $id
                    ]);

                    if (isset($subcategory['id'])) {
                        $subcategoriesIdsForNotDelete[] = $subcategory['id'];
                        $this->subcategoryRepository->update($subcategoryModel->toArray(), $subcategory['id']);
                    } else {
                        $subcategoryCreated = $this->subcategoryRepository->create($subcategoryModel->toArray());
                        $subcategoriesIdsForNotDelete[] = $subcategoryCreated['id'];
                    }
                }
            }

            $this->subcategoryRepository->deleteWhere([
                ['id', 'NOTIN', $subcategoriesIdsForNotDelete],
                'state_id' => $id
            ]);

        } catch (\Throwable $e) {
            return $this->output->unableToUpdateCategory(new UpdateCategoryResponseModel($category), $e);
        }

        return $this->output->categoryUpdated(
            new UpdateCategoryResponseModel($category)
        );
    }
}
