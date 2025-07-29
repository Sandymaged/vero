<?php

namespace App\Domain\UseCases\Service\StoreService;

use App\Domain\Interfaces\Factories\IServiceFactory;
use App\Domain\Interfaces\IViewModel;
use App\Domain\Interfaces\Repositories\IServiceRepository;
use App\Models\Service;
use App\Utiles\ImageManager;
use App\ValueObjects\PasswordValueObject;

class StoreServiceInteractor implements IStoreServiceInputPort
{

    private $output;
    private $repository;
    private $factory;

    public function __construct(
        IStoreServiceOutputPort $output,
        IServiceRepository       $repository,
        IServiceFactory          $factory
    )
    {
        $this->output = $output;
        $this->repository = $repository;
        $this->factory = $factory;
    }

    public function createService(StoreServiceRequestModel $request): IViewModel
    {
        $service = $this->factory->make([
            'name' => $request->getName(),
            'state_id' => $request->getStateId(),
            'parent_id' => $request->getParentId(),
            'is_service' => 1,
            'is_active' => $request->getIsActive(),
        ]);

        try {
            $this->repository->create($service->toArray());
        } catch (\Throwable $e) {
            return $this->output->unableToStoreService(new StoreServiceResponseModel($service), $e);
        }

        return $this->output->serviceCreated(
            new StoreServiceResponseModel($service)
        );
    }
}
