<?php

namespace App\Domain\UseCases\Admin\StoreAdmin;


use App\Domain\Interfaces\Factories\IAdminFactory;
use App\Domain\Interfaces\IViewModel;
use App\Domain\Interfaces\Repositories\IAdminRepository;
use App\Models\Admin;
use App\Utiles\ImageManager;
use App\ValueObjects\PasswordValueObject;

class StoreAdminInteractor implements IStoreAdminInputPort
{

    private $output;
    private $repository;
    private $factory;

    public function __construct(
        IStoreAdminOutputPort $output,
        IAdminRepository      $repository,
        IAdminFactory         $factory
    )
    {
        $this->output = $output;
        $this->repository = $repository;
        $this->factory = $factory;
    }

    public function createAdmin(StoreAdminRequestModel $request): IViewModel
    {
        $admin = $this->factory->make([
            'name' => $request->getName(),
            'image' => ImageManager::upload(Admin::IMAGE_DIR . '/', 'png', $request->getImage()),
            'is_active' => $request->getIsActive(),
            'email' => $request->getEmail(),
            'password' => $request->getPassword()
        ]);

        try {
            $admin = $this->repository->create(array_merge($admin->toArray(), ['password' => new PasswordValueObject($request->getPassword())]));
            $admin->roles()->sync($request->getRoles());
        } catch (\Throwable $e) {
            return $this->output->unableToStoreAdmin(new StoreAdminResponseModel($admin), $e);
        }

        return $this->output->adminCreated(
            new StoreAdminResponseModel($admin)
        );
    }
}
