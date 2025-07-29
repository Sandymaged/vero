<?php

namespace App\Domain\UseCases\City\CreateCity;

use App\Domain\Interfaces\IViewModel;
use App\Domain\Interfaces\Repositories\IStateRepository;

class CreateCityInteractor implements ICreateCityInputPort
{

    private $output;
    private $stateRepository;

    public function __construct(
        ICreateCityOutputPort $output,
        IStateRepository      $stateRepository
    )
    {
        $this->output = $output;
        $this->stateRepository = $stateRepository;
    }

    public function createCity(CreateCityRequestModel $model): IViewModel
    {

        try {
            $states = $this->stateRepository->pluck('name', 'id')->prepend('', '')->toArray();
        } catch (\Throwable $e) {
            return $this->output->error($e);
        }

        return $this->output->createCity(
            new CreateCityResponseModel($states)
        );
    }
}
