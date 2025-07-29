<?php

namespace App\Http\Controllers\Backend\Service;

use App\Adapters\ViewModels\HttpResponseIViewModel;
use App\Domain\UseCases\Service\DeleteService\DeleteServiceRequestModel;
use App\Domain\UseCases\Service\DeleteService\IDeleteServiceInputPort;
use App\Http\Controllers\Backend\AppBaseController;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response as HttpResponse;

class DeleteServiceController extends AppBaseController
{
    private $interactor;

    public function __construct(
        IDeleteServiceInputPort $interactor
    )
    {
        $this->interactor = $interactor;

        parent::__construct();
    }

    public function __invoke($id, Request $request): ?HttpResponse
    {
        $viewModel = $this->interactor->deleteService($id,
            new DeleteServiceRequestModel()
        );

        // we can't force the interactor to return an HttpResponseIViewModel
        // so we need a simple check (or PHPStan will yell)
        if ($viewModel instanceof HttpResponseIViewModel) {
            return $viewModel->getResponse();
        }

        return null;
    }
}
