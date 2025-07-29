<?php

namespace App\Domain\UseCases\State\StoreState;

use App\Domain\Interfaces\Factories\ICityFactory;
use App\Domain\Interfaces\Factories\IStateFactory;
use App\Domain\Interfaces\IViewModel;
use App\Domain\Interfaces\Repositories\ICityRepository;
use App\Domain\Interfaces\Repositories\IStateRepository;

class StoreStateInteractor implements IStoreStateInputPort
{

    private $output;
    private $repository;
    private $factory;
    private $cityFactory;
    private $cityRepository;

    public function __construct(
        IStoreStateOutputPort $output,
        IStateRepository      $repository,
        IStateFactory         $factory,
        ICityFactory          $cityFactory,
        ICityRepository       $cityRepository
    )
    {
        $this->output = $output;
        $this->repository = $repository;
        $this->factory = $factory;
        $this->cityFactory = $cityFactory;
        $this->cityRepository = $cityRepository;
    }

    public function createState(StoreStateRequestModel $request): IViewModel
    {
        $state = $this->factory->make([
            'name' => $request->getName(),
            'is_active' => $request->getIsActive()
        ]);

        try {
            $state = $this->repository->create($state->toArray());

            if ($request->getCities()) {
                foreach ($request->getCities() as $city) {
                    $city = $this->cityFactory->make([
                        'name' => $city['name'],
                        'is_active' => $city['is_active'],
                        'state_id' => $state->id
                    ]);

                    $this->cityRepository->create($city->toArray());
                }
            }

        } catch (\Throwable $e) {
            return $this->output->unableToStoreState(new StoreStateResponseModel($state), $e);
        }

        return $this->output->stateCreated(
            new StoreStateResponseModel($state)
        );
    }
}
