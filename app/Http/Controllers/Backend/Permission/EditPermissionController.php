<?php

namespace App\Http\Controllers\Backend\Permission;

use App\Adapters\ViewModels\HttpResponseIViewModel;
use App\Domain\UseCases\Permission\EditPermission\EditPermissionRequestModel;
use App\Domain\UseCases\Permission\EditPermission\IEditPermissionInputPort;
use App\Http\Controllers\Backend\AppBaseController;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response as HttpResponse;

class EditPermissionController extends AppBaseController
{
    private $interactor;

    public function __construct(
        IEditPermissionInputPort $interactor
    )
    {
        $this->interactor = $interactor;

        parent::__construct();
    }

    public function __invoke($id, Request $request): ?HttpResponse
    {
        $viewModel = $this->interactor->editPermission($id,
            new EditPermissionRequestModel()
        );

        // we can't force the interactor to return an HttpResponseIViewModel
        // so we need a simple check (or PHPStan will yell)
        if ($viewModel instanceof HttpResponseIViewModel) {
            return $viewModel->getResponse();
        }

        return null;
    }
}
