<?php

namespace App\Domain\UseCases\State\ListState;


use App\Domain\Interfaces\IViewModel;
use App\Domain\Interfaces\Repositories\IStateRepository;

class ListStateInteractor implements IListStateInputPort
{

    private $output;
    private $repository;

    public function __construct(
        IListStateOutputPort      $output,
        IStateRepository          $repository
    )
    {
        $this->output = $output;
        $this->repository = $repository;
    }

    public function listState(ListStateRequestModel $model): IViewModel
    {
        try {
            $states = $this->repository->getLatest();
        } catch (\Throwable $e) {
            return $this->output->error($e);
        }

        return $this->output->stateListed(
            new ListStateResponseModel($states)
        );
    }
}
