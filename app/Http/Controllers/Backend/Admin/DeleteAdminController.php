<?php

namespace App\Http\Controllers\Backend\Admin;

use App\Adapters\ViewModels\HttpResponseIViewModel;
use App\Domain\UseCases\Admin\DeleteAdmin\DeleteAdminRequestModel;
use App\Domain\UseCases\Admin\DeleteAdmin\IDeleteAdminInputPort;
use App\Http\Controllers\Backend\AppBaseController;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response as HttpResponse;

class DeleteAdminController extends AppBaseController
{
    private $interactor;

    public function __construct(
        IDeleteAdminInputPort $interactor
    )
    {
        $this->interactor = $interactor;
        parent::__construct();
    }

    public function __invoke($id, Request $request): ?HttpResponse
    {
        $viewModel = $this->interactor->deleteAdmin($id,
            new DeleteAdminRequestModel()
        );

        // we can't force the interactor to return an HttpResponseIViewModel
        // so we need a simple check (or PHPStan will yell)
        if ($viewModel instanceof HttpResponseIViewModel) {
            return $viewModel->getResponse();
        }

        return null;
    }
}
