<?php

namespace App\Domain\UseCases\State\DeleteState;


use App\Domain\Interfaces\Factories\IStateFactory;
use App\Domain\Interfaces\IViewModel;
use App\Domain\Interfaces\Repositories\IStateRepository;

class DeleteStateInteractor implements IDeleteStateInputPort
{

    private $output;
    private $repository;
    private $factory;

    public function __construct(
        IDeleteStateOutputPort $output,
        IStateRepository       $repository,
        IStateFactory          $factory
    )
    {
        $this->output = $output;
        $this->repository = $repository;
        $this->factory = $factory;
    }

    public function deleteState(int $id, DeleteStateRequestModel $request): IViewModel
    {

        try {
            $state = $this->repository->find($id);

            if (empty($state)) {
                return $this->output->unableToFindState();
            }

            $this->repository->delete($id);
        } catch (\Throwable $e) {
            return $this->output->unableToDeleteState($e);
        }

        return $this->output->stateDeleted(
            new DeleteStateResponseModel($state)
        );
    }
}
