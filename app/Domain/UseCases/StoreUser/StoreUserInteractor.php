<?php

namespace App\Domain\UseCases\StoreUser;

use App\Domain\Interfaces\Factories\IUserFactory;
use App\Domain\Interfaces\IViewModel;
use App\Domain\Interfaces\Repositories\IUserRepository;
use App\ValueObjects\PasswordValueObject;

class StoreUserInteractor implements IStoreUserInputPort
{

    private $output;
    private $repository;
    private $factory;

    public function __construct(
        IStoreUserOutputPort $output,
        IUserRepository       $repository,
        IUserFactory          $factory
    )
    {
        $this->output = $output;
        $this->repository = $repository;
        $this->factory = $factory;
    }

    public function createUser(StoreUserRequestModel $request): IViewModel
    {
        $user = $this->factory->make([
            'name' => $request->getName(),
            'email' => $request->getEmail(),
        ]);

        if ($this->repository->exists($user)) {
            return $this->output->userAlreadyExists(new StoreUserResponseModel($user));
        }

        try {
            $user = $this->repository->create($user, new PasswordValueObject($request->getPassword()));
        } catch (\Throwable $e) {
            return $this->output->unableToStoreUser(new StoreUserResponseModel($user), $e);
        }

        return $this->output->userCreated(
            new StoreUserResponseModel($user)
        );
    }
}
