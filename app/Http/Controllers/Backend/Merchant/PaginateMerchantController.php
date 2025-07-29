<?php

namespace App\Http\Controllers\Backend\Merchant;

use App\Adapters\ViewModels\HttpResponseIViewModel;
use App\Domain\UseCases\Merchant\PaginateMerchant\IPaginateMerchantInputPort;
use App\Domain\UseCases\Merchant\PaginateMerchant\PaginateMerchantRequestModel;
use App\Http\Controllers\Backend\AppBaseController;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response as HttpResponse;

class PaginateMerchantController extends AppBaseController
{
    private $interactor;

    public function __construct(
        IPaginateMerchantInputPort $interactor
    )
    {
        $this->interactor = $interactor;

        parent::__construct();
    }

    public function __invoke(Request $request): ?HttpResponse
    {
        $viewModel = $this->interactor->listMerchant(
            new PaginateMerchantRequestModel($request->page)
        );

        // we can't force the interactor to return an HttpResponseIViewModel
        // so we need a simple check (or PHPStan will yell)
        if ($viewModel instanceof HttpResponseIViewModel) {
            return $viewModel->getResponse();
        }

        return null;
    }
}
