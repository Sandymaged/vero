<?php

namespace App\Http\Controllers;

use App\Adapters\ViewModels\HttpResponseIViewModel;
use App\Domain\UseCases\StoreUser\IStoreUserInputPort;
use App\Domain\UseCases\StoreUser\StoreUserRequestModel;
use App\Http\Requests\StoreUserRequest;
use Symfony\Component\HttpFoundation\Response as HttpResponse;

class StoreUserController extends Controller
{
    private $interactor;
    public function __construct(
        IStoreUserInputPort $interactor
    )
    {
        $this->interactor = $interactor;
    }

    public function __invoke(StoreUserRequest $request): ?HttpResponse
    {
        $viewModel = $this->interactor->createUser(
            new StoreUserRequestModel($request->validated())
        );

        // we can't force the interactor to return an HttpResponseIViewModel
        // so we need a simple check (or PHPStan will yell)
        if ($viewModel instanceof HttpResponseIViewModel) {
            return $viewModel->getResponse();
        }

        return null;
    }
}
