<?php

namespace App\Http\Controllers\Backend\Service;

use App\Adapters\ViewModels\HttpResponseIViewModel;
use App\Domain\UseCases\Service\EditService\EditServiceRequestModel;
use App\Domain\UseCases\Service\EditService\IEditServiceInputPort;
use App\Http\Controllers\Backend\AppBaseController;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response as HttpResponse;

class EditServiceController extends AppBaseController
{
    private $interactor;

    public function __construct(
        IEditServiceInputPort $interactor
    )
    {
        $this->interactor = $interactor;

        parent::__construct();
    }

    public function __invoke($id, Request $request): ?HttpResponse
    {
        $viewModel = $this->interactor->editService($id,
            new EditServiceRequestModel()
        );

        // we can't force the interactor to return an HttpResponseIViewModel
        // so we need a simple check (or PHPStan will yell)
        if ($viewModel instanceof HttpResponseIViewModel) {
            return $viewModel->getResponse();
        }

        return null;
    }
}
