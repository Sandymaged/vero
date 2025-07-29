<?php

namespace App\Http\Controllers\Backend\Admin;

use App\Adapters\ViewModels\HttpResponseIViewModel;
use App\Domain\UseCases\Admin\ListAdmin\IListAdminInputPort;
use App\Domain\UseCases\Admin\ListAdmin\ListAdminRequestModel;
use App\Http\Controllers\Backend\AppBaseController;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response as HttpResponse;

class ListAdminController extends AppBaseController
{
    private $interactor;

    public function __construct(
        IListAdminInputPort $interactor
    )
    {
        $this->interactor = $interactor;

        parent::__construct();
    }

    public function __invoke(Request $request): ?HttpResponse
    {
        $viewModel = $this->interactor->listAdmin(
            new ListAdminRequestModel($request->page)
        );

        // we can't force the interactor to return an HttpResponseIViewModel
        // so we need a simple check (or PHPStan will yell)
        if ($viewModel instanceof HttpResponseIViewModel) {
            return $viewModel->getResponse();
        }

        return null;
    }
}
