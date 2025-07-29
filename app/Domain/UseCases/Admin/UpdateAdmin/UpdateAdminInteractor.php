<?php

namespace App\Domain\UseCases\Admin\UpdateAdmin;


use App\Domain\Interfaces\Factories\IAdminFactory;
use App\Domain\Interfaces\IViewModel;
use App\Domain\Interfaces\Repositories\IAdminRepository;
use App\Models\Admin;
use App\Utiles\ImageManager;
use App\ValueObjects\PasswordValueObject;

class UpdateAdminInteractor implements IUpdateAdminInputPort
{

    private $output;
    private $repository;
    private $factory;

    public function __construct(
        IUpdateAdminOutputPort $output,
        IAdminRepository       $repository,
        IAdminFactory          $factory
    )
    {
        $this->output = $output;
        $this->repository = $repository;
        $this->factory = $factory;
    }

    public function updateAdmin(int $id, UpdateAdminRequestModel $request): IViewModel
    {
        $attributes = [
            'name' => $request->getName(),
            'image' => ImageManager::upload(Admin::IMAGE_DIR . '/', 'png', $request->getImage()),
            'is_active' => $request->getIsActive(),
            'email' => $request->getEmail(),
            'password' => $request->getPassword()
        ];

        if (!$request->getImageRemove() && !$request->getImage()) {
            unset($attributes['image']);
        }

        if (!$request->getPassword()) {
            unset($attributes['password']);
        }

        $admin = $this->factory->make($attributes);

        try {

            if (empty($this->repository->find($id))) {
                return $this->output->unableToFindAdmin();
            }

            $admin = $this->repository->update(array_merge($admin->toArray(), ['password' => new PasswordValueObject($request->getPassword())]), $id);
            $admin->roles()->sync($request->getRoles());
        } catch (\Throwable $e) {
            return $this->output->unableToUpdateAdmin(new UpdateAdminResponseModel($admin), $e);
        }

        return $this->output->adminUpdated(
            new UpdateAdminResponseModel($admin)
        );
    }
}
