<?php

namespace App\Http\Controllers\Backend\MerchantUser;

use App\Adapters\ViewModels\HttpResponseIViewModel;
use App\Domain\UseCases\MerchantUser\ListMerchantUser\IListMerchantUserInputPort;
use App\Domain\UseCases\MerchantUser\ListMerchantUser\ListMerchantUserRequestModel;
use App\Http\Controllers\Backend\AppBaseController;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response as HttpResponse;

class ListMerchantUserController extends AppBaseController
{
    private $interactor;

    public function __construct(
        IListMerchantUserInputPort $interactor
    )
    {
        $this->interactor = $interactor;

        parent::__construct();
    }

    public function __invoke(Request $request): ?HttpResponse
    {
        $viewModel = $this->interactor->listMerchantUser(
            new ListMerchantUserRequestModel($request->page)
        );

        // we can't force the interactor to return an HttpResponseIViewModel
        // so we need a simple check (or PHPStan will yell)
        if ($viewModel instanceof HttpResponseIViewModel) {
            return $viewModel->getResponse();
        }

        return null;
    }
}
