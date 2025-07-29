<?php

namespace App\Domain\UseCases\Service\DeleteAllService;


use App\Domain\Interfaces\Factories\IServiceFactory;
use App\Domain\Interfaces\IViewModel;
use App\Domain\Interfaces\Repositories\IServiceRepository;

class DeleteAllServiceInteractor implements IDeleteAllServiceInputPort
{

    private $output;
    private $repository;
    private $factory;

    public function __construct(
        IDeleteAllServiceOutputPort $output,
        IServiceRepository          $repository,
        IServiceFactory             $factory
    )
    {
        $this->output = $output;
        $this->repository = $repository;
        $this->factory = $factory;
    }

    public function deleteAllService(DeleteAllServiceRequestModel $request): IViewModel
    {

        try {
            $this->repository->deleteWhere([
                ['id', 'IN', $request->getIds()]
            ]);

        } catch (\Throwable $e) {
            return $this->output->unableToDeleteAllService($e);
        }

        return $this->output->servicesDeleted();
    }
}
