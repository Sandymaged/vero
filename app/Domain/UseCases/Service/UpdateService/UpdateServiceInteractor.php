<?php

namespace App\Domain\UseCases\Service\UpdateService;

use App\Domain\Interfaces\Factories\IServiceFactory;
use App\Domain\Interfaces\IViewModel;
use App\Domain\Interfaces\Repositories\IServiceRepository;
use App\Models\Service;
use App\Utiles\ImageManager;
use App\ValueObjects\PasswordValueObject;

class UpdateServiceInteractor implements IUpdateServiceInputPort
{

    private $output;
    private $repository;
    private $factory;

    public function __construct(
        IUpdateServiceOutputPort $output,
        IServiceRepository       $repository,
        IServiceFactory          $factory
    )
    {
        $this->output = $output;
        $this->repository = $repository;
        $this->factory = $factory;
    }

    public function updateService(int $id, UpdateServiceRequestModel $request): IViewModel
    {
        $service = $this->factory->make([
            'name' => $request->getName(),
            'state_id' => $request->getStateId(),
            'parent_id' => $request->getParentId(),
//            'is_service' => $request->getIsService(),
            'is_active' => $request->getIsActive(),
        ]);

        try {

            if (empty($this->repository->find($id))) {
                return $this->output->unableToFindService();
            }

            $this->repository->update($service->toArray(), $id);
        } catch (\Throwable $e) {
            return $this->output->unableToUpdateService(new UpdateServiceResponseModel($service), $e);
        }

        return $this->output->serviceUpdated(
            new UpdateServiceResponseModel($service)
        );
    }
}
