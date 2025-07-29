<?php

namespace App\Domain\UseCases\State\EditState;

use App\Domain\Interfaces\IViewModel;
use App\Domain\Interfaces\Repositories\IStateRepository;

class EditStateInteractor implements IEditStateInputPort
{

    private $output;
    private $repository;

    public function __construct(
        IEditStateOutputPort $output,
        IStateRepository     $repository
    )
    {
        $this->output = $output;
        $this->repository = $repository;
    }

    public function editState(int $id, EditStateRequestModel $model): IViewModel
    {
        try {
            $state = $this->repository->find($id);

            if (empty($state)) {
                return $this->output->unableToFindState();
            }

        } catch (\Throwable $e) {
            return $this->output->error($e);
        }

        return $this->output->editState(
            new EditStateResponseModel($state)
        );
    }
}
