<?php

namespace App\Domain\UseCases\Category\EditCategory;

use App\Domain\Interfaces\Factories\ICategoryFactory;
use App\Domain\Interfaces\IViewModel;
use App\Domain\Interfaces\Repositories\ICategoryRepository;
use App\Domain\Interfaces\Repositories\IStateRepository;

class EditCategoryInteractor implements IEditCategoryInputPort
{

    private $output;
    private $stateRepository;
    private $repository;

    public function __construct(
        IEditCategoryOutputPort $output,
        IStateRepository        $stateRepository,
        ICategoryRepository     $repository
    )
    {
        $this->output = $output;
        $this->stateRepository = $stateRepository;
        $this->repository = $repository;
    }

    public function editCategory(int $id, EditCategoryRequestModel $model): IViewModel
    {

        try {
            $category = $this->repository->find($id);

            if(empty($category)){
                return $this->output->unableToFindCategory();
            }

            $states = $this->stateRepository->pluck('name', 'id')->prepend('', '')->toArray();
        } catch (\Throwable $e) {
            return $this->output->error($e);
        }

        return $this->output->editCategory(
            new EditCategoryResponseModel($category, $states)
        );
    }
}
