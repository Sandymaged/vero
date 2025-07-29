<?php

namespace App\Domain\UseCases\Category\DeleteCategory;


use App\Domain\Interfaces\Factories\ICategoryFactory;
use App\Domain\Interfaces\IViewModel;
use App\Domain\Interfaces\Repositories\ICategoryRepository;

class DeleteCategoryInteractor implements IDeleteCategoryInputPort
{

    private $output;
    private $repository;
    private $factory;

    public function __construct(
        IDeleteCategoryOutputPort $output,
        ICategoryRepository       $repository,
        ICategoryFactory          $factory
    )
    {
        $this->output = $output;
        $this->repository = $repository;
        $this->factory = $factory;
    }

    public function deleteCategory(int $id, DeleteCategoryRequestModel $request): IViewModel
    {

        try {
            $category = $this->repository->find($id);

            if (empty($category)) {
                return $this->output->unableToFindCategory();
            }

            $this->repository->delete($id);
        } catch (\Throwable $e) {
            return $this->output->unableToDeleteCategory($e);
        }

        return $this->output->categoryDeleted(
            new DeleteCategoryResponseModel($category)
        );
    }
}
