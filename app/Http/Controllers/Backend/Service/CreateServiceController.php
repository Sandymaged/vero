<?php

namespace App\Http\Controllers\Backend\Service;

use App\Adapters\ViewModels\HttpResponseIViewModel;
use App\Domain\UseCases\Service\CreateService\CreateServiceRequestModel;
use App\Domain\UseCases\Service\CreateService\ICreateServiceInputPort;
use App\Http\Controllers\Backend\AppBaseController;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response as HttpResponse;

class CreateServiceController extends AppBaseController
{
    private $interactor;

    public function __construct(
        ICreateServiceInputPort $interactor
    )
    {
        $this->interactor = $interactor;

        parent::__construct();
    }

    public function __invoke(Request $request): ?HttpResponse
    {
        $viewModel = $this->interactor->createService(
            new CreateServiceRequestModel()
        );

        // we can't force the interactor to return an HttpResponseIViewModel
        // so we need a simple check (or PHPStan will yell)
        if ($viewModel instanceof HttpResponseIViewModel) {
            return $viewModel->getResponse();
        }

        return null;
    }
}
