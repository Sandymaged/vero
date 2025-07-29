<?php

namespace App\Adapters\Presenters\MerchantBranch;

use App\Adapters\Presenters\HttpPresenter;
use App\Adapters\ViewModels\HttpResponseIViewModel;
use App\Domain\Interfaces\IViewModel;
use App\Domain\UseCases\MerchantBranch\DeleteMerchantBranch\DeleteMerchantBranchResponseModel;
use App\Domain\UseCases\MerchantBranch\EditMerchantBranch\EditMerchantBranchResponseModel;
use App\Domain\UseCases\MerchantBranch\EditMerchantBranch\IEditMerchantBranchOutputPort;
use Laracasts\Flash\Flash;

class EditMerchantBranchHttpPresenter extends HttpPresenter implements IEditMerchantBranchOutputPort
{
    public function editMerchantBranch(EditMerchantBranchResponseModel $model): IViewModel
    {
        return new HttpResponseIViewModel(
            app('view')
                ->make('backend_views.merchant_branches.edit')
                ->with([
                    'merchantBranch' => $model->getMerchantBranch(),
                    'merchants' => $model->getMerchants(),
                    'states' => $model->getStates()
                ])
        );
    }

    public function unableToFindMerchantBranch(): IViewModel
    {

        Flash::error(trans("messages.not_found", ['operator' => trans("messages.attributes.merchant_branch")]));

        return new HttpResponseIViewModel(
            app('redirect')
                ->route(request()->get('guard') . '.merchantBranches.index')
        );
    }
}
