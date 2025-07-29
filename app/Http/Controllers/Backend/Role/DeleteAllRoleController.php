<?php

namespace App\Http\Controllers\Backend\Role;

use App\Adapters\ViewModels\HttpResponseIViewModel;
use App\Domain\UseCases\Role\DeleteAllRole\IDeleteAllRoleInputPort;
use App\Domain\UseCases\Role\DeleteAllRole\DeleteAllRoleRequestModel;
use App\Http\Controllers\Backend\AppBaseController;
use App\Http\Requests\DeleteAllRequest;
use Symfony\Component\HttpFoundation\Response as HttpResponse;

class DeleteAllRoleController extends AppBaseController
{
    private $interactor;
    public function __construct(
        IDeleteAllRoleInputPort $interactor
    )
    {
        $this->interactor = $interactor;

        parent::__construct();
    }

    public function __invoke(DeleteAllRequest $request): ?HttpResponse
    {
        $viewModel = $this->interactor->deleteAllRole(
            new DeleteAllRoleRequestModel($request->all())
        );

        // we can't force the interactor to return an HttpResponseIViewModel
        // so we need a simple check (or PHPStan will yell)
        if ($viewModel instanceof HttpResponseIViewModel) {
            return $viewModel->getResponse();
        }

        return null;
    }
}
