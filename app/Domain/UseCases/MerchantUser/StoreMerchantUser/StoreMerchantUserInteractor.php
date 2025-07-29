<?php

namespace App\Domain\UseCases\MerchantUser\StoreMerchantUser;


use App\Domain\Interfaces\Factories\IMerchantUserFactory;
use App\Domain\Interfaces\IViewModel;
use App\Domain\Interfaces\Repositories\IMerchantUserRepository;
use App\Models\MerchantUser;
use App\Utiles\ImageManager;
use App\ValueObjects\PasswordValueObject;

class StoreMerchantUserInteractor implements IStoreMerchantUserInputPort
{

    private $output;
    private $repository;
    private $factory;

    public function __construct(
        IStoreMerchantUserOutputPort $output,
        IMerchantUserRepository       $repository,
        IMerchantUserFactory          $factory
    )
    {
        $this->output = $output;
        $this->repository = $repository;
        $this->factory = $factory;
    }

    public function createMerchantUser(StoreMerchantUserRequestModel $request): IViewModel
    {
        $merchantUser = $this->factory->make([
            'name' => $request->getName(),
            'merchant_branch_id' => $request->getMerchantBranchId(),
            'merchant_id' => $request->getMerchantId(),
            'image' => ImageManager::upload(MerchantUser::IMAGE_DIR . '/', 'png', $request->getImage()),
            'is_active' => $request->getIsActive(),
            'email' => $request->getEmail(),
            'password' => $request->getPassword()
        ]);

        try {
            $this->repository->create(array_merge($merchantUser->toArray(), ['password' => new PasswordValueObject($request->getPassword())]));
        } catch (\Throwable $e) {
            return $this->output->unableToStoreMerchantUser(new StoreMerchantUserResponseModel($merchantUser), $e);
        }

        return $this->output->merchantUserCreated(
            new StoreMerchantUserResponseModel($merchantUser)
        );
    }
}
