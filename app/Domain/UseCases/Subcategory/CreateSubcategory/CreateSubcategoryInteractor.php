<?php

namespace App\Domain\UseCases\Subcategory\CreateSubcategory;

use App\Domain\Interfaces\IViewModel;
use App\Domain\Interfaces\Repositories\ICategoryRepository;
use App\Domain\Interfaces\Repositories\IStateRepository;

class CreateSubcategoryInteractor implements ICreateSubcategoryInputPort
{

    private $output;
    private $stateRepository;
    private $categoryRepository;

    public function __construct(
        ICreateSubcategoryOutputPort $output,
        IStateRepository             $stateRepository,
        ICategoryRepository          $categoryRepository
    )
    {
        $this->output = $output;
        $this->categoryRepository = $categoryRepository;
        $this->stateRepository = $stateRepository;
    }

    public function createSubcategory(CreateSubcategoryRequestModel $model): IViewModel
    {

        try {
            $states = $this->stateRepository->pluck('name', 'id')->prepend('', '')->toArray();
            $categories = $this->categoryRepository->pluck('name', 'id')->prepend('', '')->toArray();
        } catch (\Throwable $e) {
            return $this->output->error($e);
        }

        return $this->output->createSubcategory(
            new CreateSubcategoryResponseModel($states, $categories)
        );
    }
}
