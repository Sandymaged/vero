<?php

namespace App\Domain\UseCases\Merchant\EditMerchant;

use App\Domain\Interfaces\Factories\IMerchantFactory;
use App\Domain\Interfaces\IViewModel;
use App\Domain\Interfaces\Repositories\IMerchantRepository;
use App\Domain\Interfaces\Repositories\IStateRepository;

class EditMerchantInteractor implements IEditMerchantInputPort
{

    private $output;
    private $stateRepository;
    private $repository;

    public function __construct(
        IEditMerchantOutputPort $output,
        IStateRepository     $stateRepository,
        IMerchantRepository      $repository
    )
    {
        $this->output = $output;
        $this->stateRepository = $stateRepository;
        $this->repository = $repository;
    }

    public function editMerchant(int $id, EditMerchantRequestModel $model): IViewModel
    {
        try {
            $merchant = $this->repository->find($id);

            if(empty($merchant)){
                return $this->output->unableToFindMerchant();
            }

            $states = $this->stateRepository->pluck('name', 'id')->prepend('', '')->toArray();
        } catch (\Throwable $e) {
            return $this->output->error($e);
        }

        return $this->output->editMerchant(
            new EditMerchantResponseModel($merchant, $states)
        );
    }
}
