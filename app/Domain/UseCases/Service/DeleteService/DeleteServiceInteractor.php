<?php

namespace App\Domain\UseCases\Service\DeleteService;


use App\Domain\Interfaces\Factories\IServiceFactory;
use App\Domain\Interfaces\IViewModel;
use App\Domain\Interfaces\Repositories\IServiceRepository;

class DeleteServiceInteractor implements IDeleteServiceInputPort
{

    private $output;
    private $repository;
    private $factory;

    public function __construct(
        IDeleteServiceOutputPort $output,
        IServiceRepository       $repository,
        IServiceFactory          $factory
    )
    {
        $this->output = $output;
        $this->repository = $repository;
        $this->factory = $factory;
    }

    public function deleteService(int $id, DeleteServiceRequestModel $request): IViewModel
    {

        try {
            $service = $this->repository->find($id);

            if (empty($service)) {
                return $this->output->unableToFindService();
            }

            $this->repository->delete($id);
        } catch (\Throwable $e) {
            return $this->output->unableToDeleteService($e);
        }

        return $this->output->serviceDeleted(
            new DeleteServiceResponseModel($service)
        );
    }
}
