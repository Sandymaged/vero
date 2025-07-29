<?php

namespace App\Http\Controllers\Backend\Offer;

use App\Adapters\ViewModels\HttpResponseIViewModel;
use App\Domain\UseCases\Offer\StoreOffer\IStoreOfferInputPort;
use App\Domain\UseCases\Offer\StoreOffer\StoreOfferRequestModel;
use App\Http\Controllers\Backend\AppBaseController;
use App\Http\Requests\Offer\StoreOfferRequest;
use Symfony\Component\HttpFoundation\Response as HttpResponse;

class StoreOfferController extends AppBaseController
{
    private $interactor;
    public function __construct(
        IStoreOfferInputPort $interactor
    )
    {
        $this->interactor = $interactor;

        parent::__construct();
    }

    public function __invoke(StoreOfferRequest $request): ?HttpResponse
    {
        $viewModel = $this->interactor->createOffer(
            new StoreOfferRequestModel($request->all())
        );

        // we can't force the interactor to return an HttpResponseIViewModel
        // so we need a simple check (or PHPStan will yell)
        if ($viewModel instanceof HttpResponseIViewModel) {
            return $viewModel->getResponse();
        }

        return null;
    }
}
