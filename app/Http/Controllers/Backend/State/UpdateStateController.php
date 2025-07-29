<?php

namespace App\Http\Controllers\Backend\State;

use App\Adapters\ViewModels\HttpResponseIViewModel;
use App\Domain\UseCases\State\UpdateState\IUpdateStateInputPort;
use App\Domain\UseCases\State\UpdateState\UpdateStateRequestModel;
use App\Http\Controllers\Backend\AppBaseController;
use App\Http\Requests\State\UpdateStateRequest;
use Symfony\Component\HttpFoundation\Response as HttpResponse;

class UpdateStateController extends AppBaseController
{
    private $interactor;
    public function __construct(
        IUpdateStateInputPort $interactor
    )
    {
        $this->interactor = $interactor;

        parent::__construct();
    }

    public function __invoke($id, UpdateStateRequest $request): ?HttpResponse
    {
        $viewModel = $this->interactor->updateState($id,
            new UpdateStateRequestModel($request->all())
        );

        // we can't force the interactor to return an HttpResponseIViewModel
        // so we need a simple check (or PHPStan will yell)
        if ($viewModel instanceof HttpResponseIViewModel) {
            return $viewModel->getResponse();
        }

        return null;
    }
}
