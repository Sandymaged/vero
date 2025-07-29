<?php

namespace App\Http\Controllers\Backend\MerchantUser;

use App\Adapters\ViewModels\HttpResponseIViewModel;
use App\Domain\UseCases\MerchantUser\UpdateMerchantUser\IUpdateMerchantUserInputPort;
use App\Domain\UseCases\MerchantUser\UpdateMerchantUser\UpdateMerchantUserRequestModel;
use App\Http\Controllers\Backend\AppBaseController;
use App\Http\Requests\MerchantUser\UpdateMerchantUserRequest;
use Symfony\Component\HttpFoundation\Response as HttpResponse;

class UpdateMerchantUserController extends AppBaseController
{
    private $interactor;
    public function __construct(
        IUpdateMerchantUserInputPort $interactor
    )
    {
        $this->interactor = $interactor;

        parent::__construct();
    }

    public function __invoke($id, UpdateMerchantUserRequest $request): ?HttpResponse
    {
        $viewModel = $this->interactor->updateMerchantUser($id,
            new UpdateMerchantUserRequestModel($request->all())
        );

        // we can't force the interactor to return an HttpResponseIViewModel
        // so we need a simple check (or PHPStan will yell)
        if ($viewModel instanceof HttpResponseIViewModel) {
            return $viewModel->getResponse();
        }

        return null;
    }
}
