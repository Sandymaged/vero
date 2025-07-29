<?php

namespace App\Domain\UseCases\State\DeleteAllState;


use App\Domain\Interfaces\Factories\IStateFactory;
use App\Domain\Interfaces\IViewModel;
use App\Domain\Interfaces\Repositories\IStateRepository;

class DeleteAllStateInteractor implements IDeleteAllStateInputPort
{

    private $output;
    private $repository;
    private $factory;

    public function __construct(
        IDeleteAllStateOutputPort $output,
        IStateRepository          $repository,
        IStateFactory             $factory
    )
    {
        $this->output = $output;
        $this->repository = $repository;
        $this->factory = $factory;
    }

    public function deleteAllState(DeleteAllStateRequestModel $request): IViewModel
    {

        try {
            $this->repository->deleteWhere([
                ['id', 'IN', $request->getIds()]
            ]);

        } catch (\Throwable $e) {
            return $this->output->unableToDeleteAllState($e);
        }

        return $this->output->statesDeleted();
    }
}
