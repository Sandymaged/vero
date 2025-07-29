<?php

namespace App\Domain\UseCases\Category\CreateCategory;

use App\Domain\Interfaces\IViewModel;
use App\Domain\Interfaces\Repositories\IStateRepository;

class CreateCategoryInteractor implements ICreateCategoryInputPort
{

    private $output;
    private $stateRepository;

    public function __construct(
        ICreateCategoryOutputPort $output,
        IStateRepository          $stateRepository
    )
    {
        $this->output = $output;
        $this->stateRepository = $stateRepository;
    }

    public function createCategory(CreateCategoryRequestModel $model): IViewModel
    {

        try {
            $states = $this->stateRepository->pluck('name', 'id')->prepend('', '')->toArray();
        } catch (\Throwable $e) {
            return $this->output->error($e);
        }

        return $this->output->createCategory(
            new CreateCategoryResponseModel($states)
        );
    }
}
