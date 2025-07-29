<?php

namespace App\Domain\UseCases\Category\DeleteAllCategory;


use App\Domain\Interfaces\Factories\ICategoryFactory;
use App\Domain\Interfaces\IViewModel;
use App\Domain\Interfaces\Repositories\ICategoryRepository;

class DeleteAllCategoryInteractor implements IDeleteAllCategoryInputPort
{

    private $output;
    private $repository;
    private $factory;

    public function __construct(
        IDeleteAllCategoryOutputPort $output,
        ICategoryRepository          $repository,
        ICategoryFactory             $factory
    )
    {
        $this->output = $output;
        $this->repository = $repository;
        $this->factory = $factory;
    }

    public function deleteAllCategory(DeleteAllCategoryRequestModel $request): IViewModel
    {

        try {
            $this->repository->deleteWhere([
                ['id', 'IN', $request->getIds()]
            ]);

        } catch (\Throwable $e) {
            return $this->output->unableToDeleteAllCategory($e);
        }

        return $this->output->categoriesDeleted();
    }
}
