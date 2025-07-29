<?php

namespace App\Http\Controllers\Backend\Merchant;

use App\Adapters\ViewModels\HttpResponseIViewModel;
use App\Domain\UseCases\Merchant\EditMerchant\EditMerchantRequestModel;
use App\Domain\UseCases\Merchant\EditMerchant\IEditMerchantInputPort;
use App\Http\Controllers\Backend\AppBaseController;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response as HttpResponse;

class EditMerchantController extends AppBaseController
{
    private $interactor;

    public function __construct(
        IEditMerchantInputPort $interactor
    )
    {
        $this->interactor = $interactor;

        parent::__construct();
    }

    public function __invoke($id, Request $request): ?HttpResponse
    {
        $viewModel = $this->interactor->editMerchant($id,
            new EditMerchantRequestModel()
        );

        // we can't force the interactor to return an HttpResponseIViewModel
        // so we need a simple check (or PHPStan will yell)
        if ($viewModel instanceof HttpResponseIViewModel) {
            return $viewModel->getResponse();
        }

        return null;
    }
}
