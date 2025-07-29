<?php

namespace App\Http\Controllers\Backend\Permission;

use App\Adapters\ViewModels\HttpResponseIViewModel;
use App\Domain\UseCases\Permission\DeleteAllPermission\IDeleteAllPermissionInputPort;
use App\Domain\UseCases\Permission\DeleteAllPermission\DeleteAllPermissionRequestModel;
use App\Http\Controllers\Backend\AppBaseController;
use App\Http\Requests\DeleteAllRequest;
use Symfony\Component\HttpFoundation\Response as HttpResponse;

class DeleteAllPermissionController extends AppBaseController
{
    private $interactor;
    public function __construct(
        IDeleteAllPermissionInputPort $interactor
    )
    {
        $this->interactor = $interactor;

        parent::__construct();
    }

    public function __invoke(DeleteAllRequest $request): ?HttpResponse
    {
        $viewModel = $this->interactor->deleteAllPermission(
            new DeleteAllPermissionRequestModel($request->all())
        );

        // we can't force the interactor to return an HttpResponseIViewModel
        // so we need a simple check (or PHPStan will yell)
        if ($viewModel instanceof HttpResponseIViewModel) {
            return $viewModel->getResponse();
        }

        return null;
    }
}
