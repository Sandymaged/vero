<?php

namespace App\Domain\UseCases\City\UpdateCity;

use App\Domain\Interfaces\Factories\ICityFactory;
use App\Domain\Interfaces\IViewModel;
use App\Domain\Interfaces\Repositories\ICityRepository;
use App\Models\City;
use App\Utiles\ImageManager;
use App\ValueObjects\PasswordValueObject;

class UpdateCityInteractor implements IUpdateCityInputPort
{

    private $output;
    private $repository;
    private $factory;

    public function __construct(
        IUpdateCityOutputPort $output,
        ICityRepository       $repository,
        ICityFactory          $factory
    )
    {
        $this->output = $output;
        $this->repository = $repository;
        $this->factory = $factory;
    }

    public function updateCity(int $id, UpdateCityRequestModel $request): IViewModel
    {
        $city = $this->factory->make([
            'state_id' => $request->getStateId(),
            'name' => $request->getName(),
            'is_active' => $request->getIsActive(),
        ]);

        try {
            if (empty($this->repository->find($id))) {
                return $this->output->unableToFindCity();
            }

            $this->repository->update($city->toArray(), $id);
        } catch (\Throwable $e) {
            return $this->output->unableToUpdateCity(new UpdateCityResponseModel($city), $e);
        }

        return $this->output->cityUpdated(
            new UpdateCityResponseModel($city)
        );
    }
}
