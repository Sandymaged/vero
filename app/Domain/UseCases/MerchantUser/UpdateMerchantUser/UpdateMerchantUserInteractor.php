<?php

namespace App\Domain\UseCases\MerchantUser\UpdateMerchantUser;


use App\Domain\Interfaces\Factories\IMerchantUserFactory;
use App\Domain\Interfaces\IViewModel;
use App\Domain\Interfaces\Repositories\IMerchantUserRepository;
use App\Models\Admin;
use App\Models\MerchantUser;
use App\Utiles\ImageManager;
use App\ValueObjects\PasswordValueObject;

class UpdateMerchantUserInteractor implements IUpdateMerchantUserInputPort
{

    private $output;
    private $repository;
    private $factory;

    public function __construct(
        IUpdateMerchantUserOutputPort $output,
        IMerchantUserRepository       $repository,
        IMerchantUserFactory          $factory
    )
    {
        $this->output = $output;
        $this->repository = $repository;
        $this->factory = $factory;
    }

    public function updateMerchantUser(int $id, UpdateMerchantUserRequestModel $request): IViewModel
    {
        $attributes = [
            'name' => $request->getName(),
            'merchant_branch_id' => $request->getMerchantBranchId(),
            'merchant_id' => $request->getMerchantId(),
            'image' => ImageManager::upload(MerchantUser::IMAGE_DIR . '/', 'png', $request->getImage()),
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

        $merchantUser = $this->factory->make($attributes);

        try {
            if (empty($this->repository->find($id))) {
                return $this->output->unableToFindMerchantUser();
            }

            $this->repository->update(array_merge($merchantUser->toArray(), ['password' => new PasswordValueObject($request->getPassword())]), $id);
        } catch (\Throwable $e) {
            return $this->output->unableToUpdateMerchantUser(new UpdateMerchantUserResponseModel($merchantUser), $e);
        }

        return $this->output->merchantUserUpdated(
            new UpdateMerchantUserResponseModel($merchantUser)
        );
    }
}
