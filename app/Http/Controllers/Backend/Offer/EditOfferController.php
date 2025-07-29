<?php

namespace App\Http\Controllers\Backend\Offer;

use App\Adapters\ViewModels\HttpResponseIViewModel;
use App\Domain\UseCases\Offer\EditOffer\EditOfferRequestModel;
use App\Domain\UseCases\Offer\EditOffer\IEditOfferInputPort;
use App\Http\Controllers\Backend\AppBaseController;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response as HttpResponse;

class EditOfferController extends AppBaseController
{
    private $interactor;

    public function __construct(
        IEditOfferInputPort $interactor
    )
    {
        $this->interactor = $interactor;

        parent::__construct();
    }

    public function __invoke($id, Request $request): ?HttpResponse
    {
        $viewModel = $this->interactor->editOffer($id,
            new EditOfferRequestModel()
        );

        // we can't force the interactor to return an HttpResponseIViewModel
        // so we need a simple check (or PHPStan will yell)
        if ($viewModel instanceof HttpResponseIViewModel) {
            return $viewModel->getResponse();
        }

        return null;
    }
}
