<?php

namespace App\Http\Controllers\Backend\Merchant;

use App\Adapters\ViewModels\HttpResponseIViewModel;
use App\Domain\UseCases\Merchant\ListMerchant\IListMerchantInputPort;
use App\Domain\UseCases\Merchant\ListMerchant\ListMerchantRequestModel;
use App\Http\Controllers\Backend\AppBaseController;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response as HttpResponse;

class ListMerchantController extends AppBaseController
{
    private $interactor;

    public function __construct(
        IListMerchantInputPort $interactor
    )
    {
        $this->interactor = $interactor;

        parent::__construct();
    }

    public function __invoke(Request $request): ?HttpResponse
    {
        $viewModel = $this->interactor->listMerchant(
            new ListMerchantRequestModel($request->page)
        );

        // we can't force the interactor to return an HttpResponseIViewModel
        // so we need a simple check (or PHPStan will yell)
        if ($viewModel instanceof HttpResponseIViewModel) {
            return $viewModel->getResponse();
        }

        return null;
    }
}
