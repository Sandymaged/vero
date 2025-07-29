<?php

namespace App\Domain\UseCases\Subcategory\DeleteAllSubcategory;


use App\Domain\Interfaces\Factories\ISubcategoryFactory;
use App\Domain\Interfaces\IViewModel;
use App\Domain\Interfaces\Repositories\ISubcategoryRepository;

class DeleteAllSubcategoryInteractor implements IDeleteAllSubcategoryInputPort
{

    private $output;
    private $repository;
    private $factory;

    public function __construct(
        IDeleteAllSubcategoryOutputPort $output,
        ISubcategoryRepository          $repository,
        ISubcategoryFactory             $factory
    )
    {
        $this->output = $output;
        $this->repository = $repository;
        $this->factory = $factory;
    }

    public function deleteAllSubcategory(DeleteAllSubcategoryRequestModel $request): IViewModel
    {

        try {
            $this->repository->deleteWhere([
                ['id', 'IN', $request->getIds()]
            ]);

        } catch (\Throwable $e) {
            return $this->output->unableToDeleteAllSubcategory($e);
        }

        return $this->output->subcategoriesDeleted();
    }
}
