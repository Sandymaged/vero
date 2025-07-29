<?php

namespace App\Domain\UseCases\Merchant\CreateMerchant;

use App\Domain\Interfaces\IViewModel;
use App\Domain\Interfaces\Repositories\IStateRepository;

class CreateMerchantInteractor implements ICreateMerchantInputPort
{

    private $output;
    private $stateRepository;

    public function __construct(
        ICreateMerchantOutputPort $output,
        IStateRepository     $stateRepository
    )
    {
        $this->output = $output;
        $this->stateRepository = $stateRepository;
    }

    public function createMerchant(CreateMerchantRequestModel $model): IViewModel
    {

        try {
            $states = $this->stateRepository->pluck('name', 'id')->prepend('', '')->toArray();
        } catch (\Throwable $e) {
            return $this->output->error($e);
        }

        return $this->output->createMerchant(
            new CreateMerchantResponseModel($states)
        );
    }
}
