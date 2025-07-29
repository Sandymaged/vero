<?php

namespace App\Console\Commands;

use App\Adapters\ViewModels\CliIViewModel;
use App\Domain\UseCases\StoreUser\IStoreUserInputPort;
use App\Domain\UseCases\StoreUser\StoreUserRequestModel;
use Illuminate\Console\Command;

class StoreUserCommand extends Command
{
    protected $signature = 'make:user {name} {email}';

    protected $description = 'Creates an user';

    public function __construct(
        IStoreUserInputPort $interactor
    )
    {
        parent::__construct();
    }

    public function handle(): int
    {
        $password = $this->ask('Password');
        $confirm = $this->ask('Confirm password');

        if ($password != $confirm) {
            $this->error("Password confirmation doesn't match.");
            return self::FAILURE;
        }

        $viewModel = $this->interactor->createUser(
            new StoreUserRequestModel([
                'name' => $this->argument('name'),
                'email' => $this->argument('email'),
                'password' => $password,
            ])
        );

        if ($viewModel instanceof CliIViewModel) {
            return $viewModel->handle($this);
        }

        return self::SUCCESS;
    }
}
