<?php

namespace App\Domain\UseCases\Subcategory\EditSubcategory;

use App\Domain\Interfaces\Factories\ISubcategoryFactory;
use App\Domain\Interfaces\IViewModel;
use App\Domain\Interfaces\Repositories\ICategoryRepository;
use App\Domain\Interfaces\Repositories\ISubcategoryRepository;
use App\Domain\Interfaces\Repositories\IStateRepository;

class EditSubcategoryInteractor implements IEditSubcategoryInputPort
{

    private $output;
    private $stateRepository;
    private $repository;
    private $categoryRepository;

    public function __construct(
        IEditSubcategoryOutputPort $output,
        IStateRepository        $stateRepository,
        ICategoryRepository     $categoryRepository,
        ISubcategoryRepository     $repository
    )
    {
        $this->output = $output;
        $this->categoryRepository = $categoryRepository;
        $this->stateRepository = $stateRepository;
        $this->repository = $repository;
    }

    public function editSubcategory(int $id, EditSubcategoryRequestModel $model): IViewModel
    {

        try {
            $subcategory = $this->repository->find($id);

            if(empty($subcategory)){
                return $this->output->unableToFindSubcategory();
            }

            $states = $this->stateRepository->pluck('name', 'id')->prepend('', '')->toArray();
            $categories = $this->categoryRepository->pluck('name', 'id')->prepend('', '')->toArray();
        } catch (\Throwable $e) {
            return $this->output->error($e);
        }

        return $this->output->editSubcategory(
            new EditSubcategoryResponseModel($subcategory, $states, $categories)
        );
    }
}
