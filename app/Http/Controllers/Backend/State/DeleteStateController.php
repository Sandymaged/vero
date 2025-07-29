<?php

namespace App\Http\Controllers\Backend\State;

use App\Adapters\ViewModels\HttpResponseIViewModel;
use App\Domain\UseCases\State\DeleteState\DeleteStateRequestModel;
use App\Domain\UseCases\State\DeleteState\IDeleteStateInputPort;
use App\Http\Controllers\Backend\AppBaseController;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response as HttpResponse;

class DeleteStateController extends AppBaseController
{
    private $interactor;

    public function __construct(
        IDeleteStateInputPort $interactor
    )
    {
        $this->interactor = $interactor;

        parent::__construct();
    }

    public function __invoke($id, Request $request): ?HttpResponse
    {
        $viewModel = $this->interactor->deleteState($id,
            new DeleteStateRequestModel()
        );

        // we can't force the interactor to return an HttpResponseIViewModel
        // so we need a simple check (or PHPStan will yell)
        if ($viewModel instanceof HttpResponseIViewModel) {
            return $viewModel->getResponse();
        }

        return null;
    }
}
