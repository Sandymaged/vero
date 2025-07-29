<?php

namespace App\Domain\UseCases\Subcategory\ListSubcategory;


use App\Domain\Interfaces\IViewModel;
use App\Domain\Interfaces\Repositories\ISubcategoryRepository;

class ListSubcategoryInteractor implements IListSubcategoryInputPort
{

    private $output;
    private $repository;

    public function __construct(
        IListSubcategoryOutputPort      $output,
        ISubcategoryRepository          $repository
    )
    {
        $this->output = $output;
        $this->repository = $repository;
    }

    public function listSubcategory(ListSubcategoryRequestModel $model): IViewModel
    {
        try {
            $subcategories = $this->repository->getLatest();
        } catch (\Throwable $e) {
            return $this->output->error($e);
        }

        return $this->output->subcategoryListed(
            new ListSubcategoryResponseModel($subcategories)
        );
    }
}
