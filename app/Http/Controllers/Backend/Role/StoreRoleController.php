<?php

namespace App\Http\Controllers\Backend\Role;

use App\Adapters\ViewModels\HttpResponseIViewModel;
use App\Domain\UseCases\Role\StoreRole\IStoreRoleInputPort;
use App\Domain\UseCases\Role\StoreRole\StoreRoleRequestModel;
use App\Http\Controllers\Backend\AppBaseController;
use App\Http\Requests\Role\StoreRoleRequest;
use Symfony\Component\HttpFoundation\Response as HttpResponse;

class StoreRoleController extends AppBaseController
{
    private $interactor;
    public function __construct(
        IStoreRoleInputPort $interactor
    )
    {
        $this->interactor = $interactor;

        parent::__construct();
    }

    public function __invoke(StoreRoleRequest $request): ?HttpResponse
    {
        $viewModel = $this->interactor->createRole(
            new StoreRoleRequestModel($request->all())
        );

        // we can't force the interactor to return an HttpResponseIViewModel
        // so we need a simple check (or PHPStan will yell)
        if ($viewModel instanceof HttpResponseIViewModel) {
            return $viewModel->getResponse();
        }

        return null;
    }
}
