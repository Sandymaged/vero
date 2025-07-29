<?php

namespace App\Domain\UseCases\Merchant\ListMerchant;

use App\Domain\Interfaces\IViewModel;
use App\Domain\Interfaces\Repositories\IStateRepository;

class ListMerchantInteractor implements IListMerchantInputPort
{

    private $output;
    private $stateRepository;

    public function __construct(
        IListMerchantOutputPort $output,
        IStateRepository     $stateRepository
    )
    {
        $this->output = $output;
        $this->stateRepository = $stateRepository;

    }

    public function listMerchant(ListMerchantRequestModel $model): IViewModel
    {
        try {
            $states = $this->stateRepository->pluck('name', 'id')->prepend('','')->toArray();
        } catch (\Throwable $e) {
            return $this->output->error($e);
        }

        return $this->output->merchantListed(
            new ListMerchantResponseModel($states)
        );
    }
}
