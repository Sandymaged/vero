<?php

namespace App\Http\Controllers\Backend\Offer;

use App\Adapters\ViewModels\HttpResponseIViewModel;
use App\Domain\UseCases\Offer\CreateOffer\CreateOfferRequestModel;
use App\Domain\UseCases\Offer\CreateOffer\ICreateOfferInputPort;
use App\Http\Controllers\Backend\AppBaseController;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response as HttpResponse;

class CreateOfferController extends AppBaseController
{
    private $interactor;

    public function __construct(
        ICreateOfferInputPort $interactor
    )
    {
        $this->interactor = $interactor;

        parent::__construct();
    }

    public function __invoke(Request $request): ?HttpResponse
    {
        $viewModel = $this->interactor->createOffer(
            new CreateOfferRequestModel()
        );

        // we can't force the interactor to return an HttpResponseIViewModel
        // so we need a simple check (or PHPStan will yell)
        if ($viewModel instanceof HttpResponseIViewModel) {
            return $viewModel->getResponse();
        }

        return null;
    }
}
