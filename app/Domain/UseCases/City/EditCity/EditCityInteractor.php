<?php

namespace App\Domain\UseCases\City\EditCity;

use App\Domain\Interfaces\Factories\ICityFactory;
use App\Domain\Interfaces\IViewModel;
use App\Domain\Interfaces\Repositories\ICityRepository;
use App\Domain\Interfaces\Repositories\IStateRepository;

class EditCityInteractor implements IEditCityInputPort
{

    private $output;
    private $stateRepository;
    private $repository;

    public function __construct(
        IEditCityOutputPort $output,
        IStateRepository    $stateRepository,
        ICityRepository     $repository
    )
    {
        $this->output = $output;
        $this->stateRepository = $stateRepository;
        $this->repository = $repository;
    }

    public function editCity(int $id, EditCityRequestModel $model): IViewModel
    {

        try {
            $city = $this->repository->find($id);

            if(empty($city)){
                return $this->output->unableToFindCity();
            }

            $states = $this->stateRepository->pluck('name', 'id')->prepend('', '')->toArray();
        } catch (\Throwable $e) {
            return $this->output->error($e);
        }

        return $this->output->editCity(
            new EditCityResponseModel($city, $states)
        );
    }
}
