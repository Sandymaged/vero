<?php

namespace App\Domain\UseCases\State\CreateState;

use App\Domain\Interfaces\IViewModel;

class CreateStateInteractor implements ICreateStateInputPort
{

    private $output;

    public function __construct(
        ICreateStateOutputPort $output
    )
    {
        $this->output = $output;
    }

    public function createState(CreateStateRequestModel $model): IViewModel
    {
        return $this->output->createState(
            new CreateStateResponseModel()
        );
    }
}
