<?php

namespace App\Http\Controllers\Backend\Admin;

use App\Adapters\ViewModels\HttpResponseIViewModel;
use App\Domain\UseCases\Admin\CreateAdmin\CreateAdminRequestModel;
use App\Domain\UseCases\Admin\CreateAdmin\ICreateAdminInputPort;
use App\Http\Controllers\Backend\AppBaseController;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response as HttpResponse;

class CreateAdminController extends AppBaseController
{
    private $interactor;

    public function __construct(
        ICreateAdminInputPort $interactor
    )
    {
        $this->interactor = $interactor;

        parent::__construct();
    }

    public function __invoke(Request $request): ?HttpResponse
    {
        $viewModel = $this->interactor->createAdmin(
            new CreateAdminRequestModel()
        );

        // we can't force the interactor to return an HttpResponseIViewModel
        // so we need a simple check (or PHPStan will yell)
        if ($viewModel instanceof HttpResponseIViewModel) {
            return $viewModel->getResponse();
        }

        return null;
    }
}
