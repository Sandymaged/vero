<?php

namespace App\Domain\UseCases\City\DeleteCity;


use App\Domain\Interfaces\Factories\ICityFactory;
use App\Domain\Interfaces\IViewModel;
use App\Domain\Interfaces\Repositories\ICityRepository;

class DeleteCityInteractor implements IDeleteCityInputPort
{

    private $output;
    private $repository;
    private $factory;

    public function __construct(
        IDeleteCityOutputPort $output,
        ICityRepository       $repository,
        ICityFactory          $factory
    )
    {
        $this->output = $output;
        $this->repository = $repository;
        $this->factory = $factory;
    }

    public function deleteCity(int $id, DeleteCityRequestModel $request): IViewModel
    {

        try {
            $city = $this->repository->find($id);

            if (empty($city)) {
                return $this->output->unableToFindCity();
            }

            $this->repository->delete($id);
        } catch (\Throwable $e) {
            return $this->output->unableToDeleteCity($e);
        }

        return $this->output->cityDeleted(
            new DeleteCityResponseModel($city)
        );
    }
}
