<?php

namespace App\Http\Controllers\Backend\Role;

use App\Adapters\ViewModels\HttpResponseIViewModel;
use App\Domain\UseCases\Role\UpdateRole\IUpdateRoleInputPort;
use App\Domain\UseCases\Role\UpdateRole\UpdateRoleRequestModel;
use App\Http\Controllers\Backend\AppBaseController;
use App\Http\Requests\Role\UpdateRoleRequest;
use Symfony\Component\HttpFoundation\Response as HttpResponse;

class UpdateRoleController extends AppBaseController
{
    private $interactor;
    public function __construct(
        IUpdateRoleInputPort $interactor
    )
    {
        $this->interactor = $interactor;

        parent::__construct();
    }

    public function __invoke($id, UpdateRoleRequest $request): ?HttpResponse
    {
        $viewModel = $this->interactor->updateRole($id,
            new UpdateRoleRequestModel($request->all())
        );

        // we can't force the interactor to return an HttpResponseIViewModel
        // so we need a simple check (or PHPStan will yell)
        if ($viewModel instanceof HttpResponseIViewModel) {
            return $viewModel->getResponse();
        }

        return null;
    }
}
