<?php

namespace App\Http\Controllers\Backend\Offer;

use App\Adapters\ViewModels\HttpResponseIViewModel;
use App\Domain\UseCases\Offer\DeleteAllOffer\IDeleteAllOfferInputPort;
use App\Domain\UseCases\Offer\DeleteAllOffer\DeleteAllOfferRequestModel;
use App\Http\Controllers\Backend\AppBaseController;
use App\Http\Requests\DeleteAllRequest;
use Symfony\Component\HttpFoundation\Response as HttpResponse;

class DeleteAllOfferController extends AppBaseController
{
    private $interactor;
    public function __construct(
        IDeleteAllOfferInputPort $interactor
    )
    {
        $this->interactor = $interactor;

        parent::__construct();
    }

    public function __invoke(DeleteAllRequest $request): ?HttpResponse
    {
        $viewModel = $this->interactor->deleteAllOffer(
            new DeleteAllOfferRequestModel($request->all())
        );

        // we can't force the interactor to return an HttpResponseIViewModel
        // so we need a simple check (or PHPStan will yell)
        if ($viewModel instanceof HttpResponseIViewModel) {
            return $viewModel->getResponse();
        }

        return null;
    }
}
