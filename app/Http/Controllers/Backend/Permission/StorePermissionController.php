<?php

namespace App\Http\Controllers\Backend\Permission;

use App\Adapters\ViewModels\HttpResponseIViewModel;
use App\Domain\UseCases\Permission\StorePermission\IStorePermissionInputPort;
use App\Domain\UseCases\Permission\StorePermission\StorePermissionRequestModel;
use App\Http\Controllers\Backend\AppBaseController;
use App\Http\Requests\Permission\StorePermissionRequest;
use Symfony\Component\HttpFoundation\Response as HttpResponse;

class StorePermissionController extends AppBaseController
{
    private $interactor;
    public function __construct(
        IStorePermissionInputPort $interactor
    )
    {
        $this->interactor = $interactor;

        parent::__construct();
    }

    public function __invoke(StorePermissionRequest $request): ?HttpResponse
    {
        $viewModel = $this->interactor->createPermission(
            new StorePermissionRequestModel($request->all())
        );

        // we can't force the interactor to return an HttpResponseIViewModel
        // so we need a simple check (or PHPStan will yell)
        if ($viewModel instanceof HttpResponseIViewModel) {
            return $viewModel->getResponse();
        }

        return null;
    }
}
