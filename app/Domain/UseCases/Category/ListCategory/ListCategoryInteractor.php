<?php

namespace App\Domain\UseCases\Category\ListCategory;


use App\Domain\Interfaces\IViewModel;
use App\Domain\Interfaces\Repositories\ICategoryRepository;

class ListCategoryInteractor implements IListCategoryInputPort
{

    private $output;
    private $repository;

    public function __construct(
        IListCategoryOutputPort      $output,
        ICategoryRepository          $repository
    )
    {
        $this->output = $output;
        $this->repository = $repository;
    }

    public function listCategory(ListCategoryRequestModel $model): IViewModel
    {
        try {
            $categories = $this->repository->getLatest();
        } catch (\Throwable $e) {
            return $this->output->error($e);
        }

        return $this->output->categoryListed(
            new ListCategoryResponseModel($categories)
        );
    }
}
