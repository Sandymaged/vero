<?php

namespace App\Domain\UseCases\City\DeleteAllCity;


use App\Domain\Interfaces\Factories\ICityFactory;
use App\Domain\Interfaces\IViewModel;
use App\Domain\Interfaces\Repositories\ICityRepository;

class DeleteAllCityInteractor implements IDeleteAllCityInputPort
{

    private $output;
    private $repository;
    private $factory;

    public function __construct(
        IDeleteAllCityOutputPort $output,
        ICityRepository          $repository,
        ICityFactory             $factory
    )
    {
        $this->output = $output;
        $this->repository = $repository;
        $this->factory = $factory;
    }

    public function deleteAllCity(DeleteAllCityRequestModel $request): IViewModel
    {

        try {
            $this->repository->deleteWhere([
                ['id', 'IN', $request->getIds()]
            ]);

        } catch (\Throwable $e) {
            return $this->output->unableToDeleteAllCity($e);
        }

        return $this->output->citiesDeleted();
    }
}
