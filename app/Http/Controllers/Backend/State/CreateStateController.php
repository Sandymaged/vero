<?php

namespace App\Http\Controllers\Backend\State;

use App\Adapters\ViewModels\HttpResponseIViewModel;
use App\Domain\UseCases\State\CreateState\CreateStateRequestModel;
use App\Domain\UseCases\State\CreateState\ICreateStateInputPort;
use App\Http\Controllers\Backend\AppBaseController;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response as HttpResponse;

class CreateStateController extends AppBaseController
{
    private $interactor;

    public function __construct(
        ICreateStateInputPort $interactor
    )
    {
        $this->interactor = $interactor;

        parent::__construct();
    }

    public function __invoke(Request $request): ?HttpResponse
    {
        $viewModel = $this->interactor->createState(
            new CreateStateRequestModel()
        );

        // we can't force the interactor to return an HttpResponseIViewModel
        // so we need a simple check (or PHPStan will yell)
        if ($viewModel instanceof HttpResponseIViewModel) {
            return $viewModel->getResponse();
        }

        return null;
    }
}
