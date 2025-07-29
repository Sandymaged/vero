<?php

namespace App\Domain\UseCases\Service\EditService;

use App\Domain\Interfaces\IViewModel;
use App\Domain\Interfaces\Repositories\IServiceRepository;
use App\Domain\Interfaces\Repositories\IStateRepository;
use App\Domain\Interfaces\Repositories\ISubcategoryRepository;

class EditServiceInteractor implements IEditServiceInputPort
{

    private $output;
    private $stateRepository;
    private $repository;
    private $subcategoryRepository;

    public function __construct(
        IEditServiceOutputPort $output,
        IStateRepository       $stateRepository,
        ISubcategoryRepository $subcategoryRepository,
        IServiceRepository     $repository
    )
    {
        $this->output = $output;
        $this->subcategoryRepository = $subcategoryRepository;
        $this->stateRepository = $stateRepository;
        $this->repository = $repository;
    }

    public function editService(int $id, EditServiceRequestModel $model): IViewModel
    {

        try {
            $service = $this->repository->find($id);

            if (empty($service)) {
                return $this->output->unableToFindService();
            }

            $states = $this->stateRepository->pluck('name', 'id')->prepend('', '')->toArray();
            $subcategories = $this->subcategoryRepository->pluck('name', 'id')->prepend('', '')->toArray();
        } catch (\Throwable $e) {
            return $this->output->error($e);
        }

        return $this->output->editService(
            new EditServiceResponseModel($service, $states, $subcategories)
        );
    }
}
