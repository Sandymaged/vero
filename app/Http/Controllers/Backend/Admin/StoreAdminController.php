<?php

namespace App\Http\Controllers\Backend\Admin;

use App\Adapters\ViewModels\HttpResponseIViewModel;
use App\Domain\UseCases\Admin\StoreAdmin\IStoreAdminInputPort;
use App\Domain\UseCases\Admin\StoreAdmin\StoreAdminRequestModel;
use App\Http\Controllers\Backend\AppBaseController;
use App\Http\Requests\Admin\StoreAdminRequest;
use Symfony\Component\HttpFoundation\Response as HttpResponse;

class StoreAdminController extends AppBaseController
{
    private $interactor;
    public function __construct(
        IStoreAdminInputPort $interactor
    )
    {
        $this->interactor = $interactor;

        parent::__construct();
    }

    public function __invoke(StoreAdminRequest $request): ?HttpResponse
    {
        $viewModel = $this->interactor->createAdmin(
            new StoreAdminRequestModel($request->all())
        );

        // we can't force the interactor to return an HttpResponseIViewModel
        // so we need a simple check (or PHPStan will yell)
        if ($viewModel instanceof HttpResponseIViewModel) {
            return $viewModel->getResponse();
        }

        return null;
    }
}
