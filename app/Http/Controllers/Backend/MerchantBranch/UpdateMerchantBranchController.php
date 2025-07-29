<?php

namespace App\Http\Controllers\Backend\MerchantBranch;

use App\Adapters\ViewModels\HttpResponseIViewModel;
use App\Domain\UseCases\MerchantBranch\UpdateMerchantBranch\IUpdateMerchantBranchInputPort;
use App\Domain\UseCases\MerchantBranch\UpdateMerchantBranch\UpdateMerchantBranchRequestModel;
use App\Http\Controllers\Backend\AppBaseController;
use App\Http\Requests\MerchantBranch\UpdateMerchantBranchRequest;
use Symfony\Component\HttpFoundation\Response as HttpResponse;

class UpdateMerchantBranchController extends AppBaseController
{
    private $interactor;
    public function __construct(
        IUpdateMerchantBranchInputPort $interactor
    )
    {
        $this->interactor = $interactor;

        parent::__construct();
    }

    public function __invoke($id, UpdateMerchantBranchRequest $request): ?HttpResponse
    {
        $viewModel = $this->interactor->updateMerchantBranch($id,
            new UpdateMerchantBranchRequestModel($request->all())
        );

        // we can't force the interactor to return an HttpResponseIViewModel
        // so we need a simple check (or PHPStan will yell)
        if ($viewModel instanceof HttpResponseIViewModel) {
            return $viewModel->getResponse();
        }

        return null;
    }
}
