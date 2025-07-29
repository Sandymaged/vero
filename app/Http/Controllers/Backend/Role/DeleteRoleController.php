<?php

namespace App\Http\Controllers\Backend\Role;

use App\Adapters\ViewModels\HttpResponseIViewModel;
use App\Domain\UseCases\Role\DeleteRole\DeleteRoleRequestModel;
use App\Domain\UseCases\Role\DeleteRole\IDeleteRoleInputPort;
use App\Http\Controllers\Backend\AppBaseController;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response as HttpResponse;

class DeleteRoleController extends AppBaseController
{
    private $interactor;

    public function __construct(
        IDeleteRoleInputPort $interactor
    )
    {
        $this->interactor = $interactor;

        parent::__construct();
    }

    public function __invoke($id, Request $request): ?HttpResponse
    {
        $viewModel = $this->interactor->deleteRole($id,
            new DeleteRoleRequestModel()
        );

        // we can't force the interactor to return an HttpResponseIViewModel
        // so we need a simple check (or PHPStan will yell)
        if ($viewModel instanceof HttpResponseIViewModel) {
            return $viewModel->getResponse();
        }

        return null;
    }
}
