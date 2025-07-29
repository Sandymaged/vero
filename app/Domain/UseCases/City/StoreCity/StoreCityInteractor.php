<?php

namespace App\Domain\UseCases\City\StoreCity;

use App\Domain\Interfaces\Factories\ICityFactory;
use App\Domain\Interfaces\IViewModel;
use App\Domain\Interfaces\Repositories\ICityRepository;
use App\Models\City;
use App\Utiles\ImageManager;
use App\ValueObjects\PasswordValueObject;

class StoreCityInteractor implements IStoreCityInputPort
{

    private $output;
    private $repository;
    private $factory;

    public function __construct(
        IStoreCityOutputPort $output,
        ICityRepository       $repository,
        ICityFactory          $factory
    )
    {
        $this->output = $output;
        $this->repository = $repository;
        $this->factory = $factory;
    }

    public function createCity(StoreCityRequestModel $request): IViewModel
    {
        $city = $this->factory->make([
            'state_id' => $request->getStateId(),
            'name' => $request->getName(),
            'is_active' => $request->getIsActive(),
        ]);

        try {
            $this->repository->create($city->toArray());
        } catch (\Throwable $e) {
            return $this->output->unableToStoreCity(new StoreCityResponseModel($city), $e);
        }

        return $this->output->cityCreated(
            new StoreCityResponseModel($city)
        );
    }
}
