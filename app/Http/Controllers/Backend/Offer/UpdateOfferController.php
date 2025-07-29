<?php

namespace App\Http\Controllers\Backend\Offer;

use App\Adapters\ViewModels\HttpResponseIViewModel;
use App\Domain\UseCases\Offer\UpdateOffer\IUpdateOfferInputPort;
use App\Domain\UseCases\Offer\UpdateOffer\UpdateOfferRequestModel;
use App\Http\Controllers\Backend\AppBaseController;
use App\Http\Requests\Offer\UpdateOfferRequest;
use Symfony\Component\HttpFoundation\Response as HttpResponse;

class UpdateOfferController extends AppBaseController
{
    private $interactor;
    public function __construct(
        IUpdateOfferInputPort $interactor
    )
    {
        $this->interactor = $interactor;

        parent::__construct();
    }

    public function __invoke($id, UpdateOfferRequest $request): ?HttpResponse
    {
        $viewModel = $this->interactor->updateOffer($id,
            new UpdateOfferRequestModel($request->all())
        );

        // we can't force the interactor to return an HttpResponseIViewModel
        // so we need a simple check (or PHPStan will yell)
        if ($viewModel instanceof HttpResponseIViewModel) {
            return $viewModel->getResponse();
        }

        return null;
    }
}
