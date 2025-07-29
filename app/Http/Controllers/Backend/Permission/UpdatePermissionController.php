<?php

namespace App\Http\Controllers\Backend\Permission;

use App\Adapters\ViewModels\HttpResponseIViewModel;
use App\Domain\UseCases\Permission\UpdatePermission\IUpdatePermissionInputPort;
use App\Domain\UseCases\Permission\UpdatePermission\UpdatePermissionRequestModel;
use App\Http\Controllers\Backend\AppBaseController;
use App\Http\Requests\Permission\UpdatePermissionRequest;
use Symfony\Component\HttpFoundation\Response as HttpResponse;

class UpdatePermissionController extends AppBaseController
{
    private $interactor;
    public function __construct(
        IUpdatePermissionInputPort $interactor
    )
    {
        $this->interactor = $interactor;

        parent::__construct();
    }

    public function __invoke($id, UpdatePermissionRequest $request): ?HttpResponse
    {
        $viewModel = $this->interactor->updatePermission($id,
            new UpdatePermissionRequestModel($request->all())
        );

        // we can't force the interactor to return an HttpResponseIViewModel
        // so we need a simple check (or PHPStan will yell)
        if ($viewModel instanceof HttpResponseIViewModel) {
            return $viewModel->getResponse();
        }

        return null;
    }
}
