<?php

namespace App\Http\Controllers\Backend\MerchantUser;

use App\Adapters\ViewModels\HttpResponseIViewModel;
use App\Domain\UseCases\MerchantUser\DeleteAllMerchantUser\IDeleteAllMerchantUserInputPort;
use App\Domain\UseCases\MerchantUser\DeleteAllMerchantUser\DeleteAllMerchantUserRequestModel;
use App\Http\Controllers\Backend\AppBaseController;
use App\Http\Requests\DeleteAllRequest;
use Symfony\Component\HttpFoundation\Response as HttpResponse;

class DeleteAllMerchantUserController extends AppBaseController
{
    private $interactor;
    public function __construct(
        IDeleteAllMerchantUserInputPort $interactor
    )
    {
        $this->interactor = $interactor;

        parent::__construct();
    }

    public function __invoke(DeleteAllRequest $request): ?HttpResponse
    {
        $viewModel = $this->interactor->deleteAllMerchantUser(
            new DeleteAllMerchantUserRequestModel($request->all())
        );

        // we can't force the interactor to return an HttpResponseIViewModel
        // so we need a simple check (or PHPStan will yell)
        if ($viewModel instanceof HttpResponseIViewModel) {
            return $viewModel->getResponse();
        }

        return null;
    }
}
