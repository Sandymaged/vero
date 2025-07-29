<?php

namespace App\Http\Controllers\Backend\Permission;

use App\Adapters\ViewModels\HttpResponseIViewModel;
use App\Domain\UseCases\Permission\DeletePermission\DeletePermissionRequestModel;
use App\Domain\UseCases\Permission\DeletePermission\IDeletePermissionInputPort;
use App\Http\Controllers\Backend\AppBaseController;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response as HttpResponse;

class DeletePermissionController extends AppBaseController
{
    private $interactor;

    public function __construct(
        IDeletePermissionInputPort $interactor
    )
    {
        $this->interactor = $interactor;

        parent::__construct();
    }

    public function __invoke($id, Request $request): ?HttpResponse
    {
        $viewModel = $this->interactor->deletePermission($id,
            new DeletePermissionRequestModel()
        );

        // we can't force the interactor to return an HttpResponseIViewModel
        // so we need a simple check (or PHPStan will yell)
        if ($viewModel instanceof HttpResponseIViewModel) {
            return $viewModel->getResponse();
        }

        return null;
    }
}
