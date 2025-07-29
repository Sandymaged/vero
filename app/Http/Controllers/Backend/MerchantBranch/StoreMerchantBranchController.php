<?php

namespace App\Http\Controllers\Backend\MerchantBranch;

use App\Adapters\ViewModels\HttpResponseIViewModel;
use App\Domain\UseCases\MerchantBranch\StoreMerchantBranch\IStoreMerchantBranchInputPort;
use App\Domain\UseCases\MerchantBranch\StoreMerchantBranch\StoreMerchantBranchRequestModel;
use App\Http\Controllers\Backend\AppBaseController;
use App\Http\Requests\MerchantBranch\StoreMerchantBranchRequest;
use Symfony\Component\HttpFoundation\Response as HttpResponse;

class StoreMerchantBranchController extends AppBaseController
{
    private $interactor;
    public function __construct(
        IStoreMerchantBranchInputPort $interactor
    )
    {
        $this->interactor = $interactor;

        parent::__construct();
    }

    public function __invoke(StoreMerchantBranchRequest $request): ?HttpResponse
    {
        $viewModel = $this->interactor->createMerchantBranch(
            new StoreMerchantBranchRequestModel($request->all())
        );

        // we can't force the interactor to return an HttpResponseIViewModel
        // so we need a simple check (or PHPStan will yell)
        if ($viewModel instanceof HttpResponseIViewModel) {
            return $viewModel->getResponse();
        }

        return null;
    }
}
