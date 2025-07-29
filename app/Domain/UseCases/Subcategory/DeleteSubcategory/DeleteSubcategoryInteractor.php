<?php

namespace App\Domain\UseCases\Subcategory\DeleteSubcategory;


use App\Domain\Interfaces\Factories\ISubcategoryFactory;
use App\Domain\Interfaces\IViewModel;
use App\Domain\Interfaces\Repositories\ISubcategoryRepository;

class DeleteSubcategoryInteractor implements IDeleteSubcategoryInputPort
{

    private $output;
    private $repository;
    private $factory;

    public function __construct(
        IDeleteSubcategoryOutputPort $output,
        ISubcategoryRepository       $repository,
        ISubcategoryFactory          $factory
    )
    {
        $this->output = $output;
        $this->repository = $repository;
        $this->factory = $factory;
    }

    public function deleteSubcategory(int $id, DeleteSubcategoryRequestModel $request): IViewModel
    {

        try {
            $subcategory = $this->repository->find($id);

            if (empty($subcategory)) {
                return $this->output->unableToFindSubcategory();
            }

            $this->repository->delete($id);
        } catch (\Throwable $e) {
            return $this->output->unableToDeleteSubcategory($e);
        }

        return $this->output->subcategoryDeleted(
            new DeleteSubcategoryResponseModel($subcategory)
        );
    }
}
