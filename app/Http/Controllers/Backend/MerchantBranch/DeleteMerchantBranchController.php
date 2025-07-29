<?php

namespace App\Http\Controllers\Backend\MerchantBranch;

use App\Adapters\ViewModels\HttpResponseIViewModel;
use App\Domain\UseCases\MerchantBranch\DeleteMerchantBranch\DeleteMerchantBranchRequestModel;
use App\Domain\UseCases\MerchantBranch\DeleteMerchantBranch\IDeleteMerchantBranchInputPort;
use App\Http\Controllers\Backend\AppBaseController;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response as HttpResponse;

class DeleteMerchantBranchController extends AppBaseController
{
    private $interactor;

    public function __construct(
        IDeleteMerchantBranchInputPort $interactor
    )
    {
        $this->interactor = $interactor;

        parent::__construct();
    }

    public function __invoke($id, Request $request): ?HttpResponse
    {
        $viewModel = $this->interactor->deleteMerchantBranch($id,
            new DeleteMerchantBranchRequestModel()
        );

        // we can't force the interactor to return an HttpResponseIViewModel
        // so we need a simple check (or PHPStan will yell)
        if ($viewModel instanceof HttpResponseIViewModel) {
            return $viewModel->getResponse();
        }

        return null;
    }
}
