<?php

namespace App\Http\Controllers\Backend\Service;

use App\Adapters\ViewModels\HttpResponseIViewModel;
use App\Domain\UseCases\Service\UpdateService\IUpdateServiceInputPort;
use App\Domain\UseCases\Service\UpdateService\UpdateServiceRequestModel;
use App\Http\Controllers\Backend\AppBaseController;
use App\Http\Requests\Service\UpdateServiceRequest;
use Symfony\Component\HttpFoundation\Response as HttpResponse;

class UpdateServiceController extends AppBaseController
{
    private $interactor;
    public function __construct(
        IUpdateServiceInputPort $interactor
    )
    {
        $this->interactor = $interactor;

        parent::__construct();
    }

    public function __invoke($id, UpdateServiceRequest $request): ?HttpResponse
    {
        $viewModel = $this->interactor->updateService($id,
            new UpdateServiceRequestModel($request->all())
        );

        // we can't force the interactor to return an HttpResponseIViewModel
        // so we need a simple check (or PHPStan will yell)
        if ($viewModel instanceof HttpResponseIViewModel) {
            return $viewModel->getResponse();
        }

        return null;
    }
}
