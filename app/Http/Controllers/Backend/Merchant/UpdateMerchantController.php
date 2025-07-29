<?php

namespace App\Http\Controllers\Backend\Merchant;

use App\Adapters\ViewModels\HttpResponseIViewModel;
use App\Domain\UseCases\Merchant\UpdateMerchant\IUpdateMerchantInputPort;
use App\Domain\UseCases\Merchant\UpdateMerchant\UpdateMerchantRequestModel;
use App\Http\Controllers\Backend\AppBaseController;
use App\Http\Requests\Merchant\UpdateMerchantRequest;
use Symfony\Component\HttpFoundation\Response as HttpResponse;

class UpdateMerchantController extends AppBaseController
{
    private $interactor;
    public function __construct(
        IUpdateMerchantInputPort $interactor
    )
    {
        $this->interactor = $interactor;

        parent::__construct();
    }

    public function __invoke($id, UpdateMerchantRequest $request): ?HttpResponse
    {
        $viewModel = $this->interactor->updateMerchant($id,
            new UpdateMerchantRequestModel($request->all())
        );

        // we can't force the interactor to return an HttpResponseIViewModel
        // so we need a simple check (or PHPStan will yell)
        if ($viewModel instanceof HttpResponseIViewModel) {
            return $viewModel->getResponse();
        }

        return null;
    }
}
