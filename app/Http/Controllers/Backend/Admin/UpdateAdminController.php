<?php

namespace App\Http\Controllers\Backend\Admin;

use App\Adapters\ViewModels\HttpResponseIViewModel;
use App\Domain\UseCases\Admin\UpdateAdmin\IUpdateAdminInputPort;
use App\Domain\UseCases\Admin\UpdateAdmin\UpdateAdminRequestModel;
use App\Http\Controllers\Backend\AppBaseController;
use App\Http\Requests\Admin\UpdateAdminRequest;
use Symfony\Component\HttpFoundation\Response as HttpResponse;

class UpdateAdminController extends AppBaseController
{
    private $interactor;
    public function __construct(
        IUpdateAdminInputPort $interactor
    )
    {
        $this->interactor = $interactor;

        parent::__construct();
    }

    public function __invoke($id, UpdateAdminRequest $request): ?HttpResponse
    {
        $viewModel = $this->interactor->updateAdmin($id,
            new UpdateAdminRequestModel($request->all())
        );

        // we can't force the interactor to return an HttpResponseIViewModel
        // so we need a simple check (or PHPStan will yell)
        if ($viewModel instanceof HttpResponseIViewModel) {
            return $viewModel->getResponse();
        }

        return null;
    }
}
