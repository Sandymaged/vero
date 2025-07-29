<?php

namespace App\Domain\UseCases\Service\CreateService;

use App\Domain\Interfaces\IViewModel;
use App\Domain\Interfaces\Repositories\IStateRepository;
use App\Domain\Interfaces\Repositories\ISubcategoryRepository;

class CreateServiceInteractor implements ICreateServiceInputPort
{

    private $output;
    private $stateRepository;
    private $subcategoryRepository;

    public function __construct(
        ICreateServiceOutputPort $output,
        IStateRepository         $stateRepository,
        ISubcategoryRepository   $subcategoryRepository
    )
    {
        $this->output = $output;
        $this->subcategoryRepository = $subcategoryRepository;
        $this->stateRepository = $stateRepository;
    }

    public function createService(CreateServiceRequestModel $model): IViewModel
    {

        try {
            $states = $this->stateRepository->pluck('name', 'id')->prepend('', '')->toArray();
            $subcategories = $this->subcategoryRepository->pluck('name', 'id')->prepend('', '')->toArray();
        } catch (\Throwable $e) {
            return $this->output->error($e);
        }

        return $this->output->createService(
            new CreateServiceResponseModel($states, $subcategories)
        );
    }
}
