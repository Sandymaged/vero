<?php

namespace App\Domain\UseCases\City\ListCity;


use App\Domain\Interfaces\IViewModel;
use App\Domain\Interfaces\Repositories\ICityRepository;

class ListCityInteractor implements IListCityInputPort
{

    private $output;
    private $repository;

    public function __construct(
        IListCityOutputPort      $output,
        ICityRepository          $repository
    )
    {
        $this->output = $output;
        $this->repository = $repository;
    }

    public function listCity(ListCityRequestModel $model): IViewModel
    {
        try {
            $cities = $this->repository->getLatest();
        } catch (\Throwable $e) {
            return $this->output->error($e);
        }

        return $this->output->cityListed(
            new ListCityResponseModel($cities)
        );
    }
}
