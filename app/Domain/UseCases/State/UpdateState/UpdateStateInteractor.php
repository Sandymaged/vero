<?php

namespace App\Domain\UseCases\State\UpdateState;

use App\Domain\Interfaces\Factories\ICityFactory;
use App\Domain\Interfaces\Factories\IStateFactory;
use App\Domain\Interfaces\IViewModel;
use App\Domain\Interfaces\Repositories\ICityRepository;
use App\Domain\Interfaces\Repositories\IStateRepository;

class UpdateStateInteractor implements IUpdateStateInputPort
{

    private $output;
    private $repository;
    private $factory;
    private $cityFactory;
    private $cityRepository;

    public function __construct(
        IUpdateStateOutputPort $output,
        IStateRepository       $repository,
        IStateFactory          $factory,
        ICityFactory           $cityFactory,
        ICityRepository        $cityRepository
    )
    {
        $this->output = $output;
        $this->repository = $repository;
        $this->factory = $factory;
        $this->cityFactory = $cityFactory;
        $this->cityRepository = $cityRepository;
    }

    public function updateState(int $id, UpdateStateRequestModel $request): IViewModel
    {
        $state = $this->factory->make([
            'name' => $request->getName(),
            'is_active' => $request->getIsActive()
        ]);

        try {

            if (empty($this->repository->find($id))) {
                return $this->output->unableToFindState();
            }

            $this->repository->update($state->toArray(), $id);

            $citiesIdsForNotDelete = [];
            if ($request->getCities()) {
                foreach ($request->getCities() as $city) {
                    $cityModel = $this->cityFactory->make([
                        'name' => $city['name'],
                        'is_active' => $city['is_active'],
                        'state_id' => $id
                    ]);

                    if (isset($city['id'])) {
                        $citiesIdsForNotDelete[] = $city['id'];
                        $this->cityRepository->update($cityModel->toArray(), $city['id']);
                    } else {
                        $cityCreated = $this->cityRepository->create($cityModel->toArray());
                        $citiesIdsForNotDelete[] = $cityCreated['id'];
                    }
                }
            }

            $this->cityRepository->deleteWhere([
                ['id', 'NOTIN', $citiesIdsForNotDelete],
                'state_id' => $id
            ]);

        } catch (\Throwable $e) {
            return $this->output->unableToUpdateState(new UpdateStateResponseModel($state), $e);
        }

        return $this->output->stateUpdated(
            new UpdateStateResponseModel($state)
        );
    }
}
