<?php

namespace App\Http\Controllers\Backend\State;

use App\Adapters\ViewModels\HttpResponseIViewModel;
use App\Domain\UseCases\State\EditState\EditStateRequestModel;
use App\Domain\UseCases\State\EditState\IEditStateInputPort;
use App\Http\Controllers\Backend\AppBaseController;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response as HttpResponse;

class EditStateController extends AppBaseController
{
    private $interactor;

    public function __construct(
        IEditStateInputPort $interactor
    )
    {
        $this->interactor = $interactor;

        parent::__construct();
    }

    public function __invoke($id, Request $request): ?HttpResponse
    {
        $viewModel = $this->interactor->editState($id,
            new EditStateRequestModel()
        );

        // we can't force the interactor to return an HttpResponseIViewModel
        // so we need a simple check (or PHPStan will yell)
        if ($viewModel instanceof HttpResponseIViewModel) {
            return $viewModel->getResponse();
        }

        return null;
    }
}
