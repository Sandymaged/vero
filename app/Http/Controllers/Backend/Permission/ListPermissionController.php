<?php

namespace App\Http\Controllers\Backend\Permission;

use App\Adapters\ViewModels\HttpResponseIViewModel;
use App\Domain\UseCases\Permission\ListPermission\IListPermissionInputPort;
use App\Domain\UseCases\Permission\ListPermission\ListPermissionRequestModel;
use App\Http\Controllers\Backend\AppBaseController;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response as HttpResponse;

class ListPermissionController extends AppBaseController
{
    private $interactor;

    public function __construct(
        IListPermissionInputPort $interactor
    )
    {
        $this->interactor = $interactor;

        parent::__construct();
    }

    public function __invoke(Request $request): ?HttpResponse
    {
        $viewModel = $this->interactor->listPermission(
            new ListPermissionRequestModel($request->page)
        );

        // we can't force the interactor to return an HttpResponseIViewModel
        // so we need a simple check (or PHPStan will yell)
        if ($viewModel instanceof HttpResponseIViewModel) {
            return $viewModel->getResponse();
        }

        return null;
    }
}
