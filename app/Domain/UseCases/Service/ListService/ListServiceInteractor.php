<?php

namespace App\Domain\UseCases\Service\ListService;


use App\Domain\Interfaces\IViewModel;
use App\Domain\Interfaces\Repositories\IServiceRepository;

class ListServiceInteractor implements IListServiceInputPort
{

    private $output;
    private $repository;

    public function __construct(
        IListServiceOutputPort      $output,
        IServiceRepository          $repository
    )
    {
        $this->output = $output;
        $this->repository = $repository;
    }

    public function listService(ListServiceRequestModel $model): IViewModel
    {
        try {
            $services = $this->repository->getLatest();
        } catch (\Throwable $e) {
            return $this->output->error($e);
        }

        return $this->output->serviceListed(
            new ListServiceResponseModel($services)
        );
    }
}
