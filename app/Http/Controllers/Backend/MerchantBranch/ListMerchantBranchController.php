<?php

namespace App\Http\Controllers\Backend\MerchantBranch;

use App\Adapters\ViewModels\HttpResponseIViewModel;
use App\Domain\UseCases\MerchantBranch\ListMerchantBranch\IListMerchantBranchInputPort;
use App\Domain\UseCases\MerchantBranch\ListMerchantBranch\ListMerchantBranchRequestModel;
use App\Http\Controllers\Backend\AppBaseController;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response as HttpResponse;

class ListMerchantBranchController extends AppBaseController
{
    private $interactor;

    public function __construct(
        IListMerchantBranchInputPort $interactor
    )
    {
        $this->interactor = $interactor;

        parent::__construct();
    }

    public function __invoke(Request $request): ?HttpResponse
    {
        $viewModel = $this->interactor->listMerchantBranch(
            new ListMerchantBranchRequestModel($request->page)
        );

        // we can't force the interactor to return an HttpResponseIViewModel
        // so we need a simple check (or PHPStan will yell)
        if ($viewModel instanceof HttpResponseIViewModel) {
            return $viewModel->getResponse();
        }

        return null;
    }
}
