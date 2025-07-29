<?php

namespace App\Adapters\Presenters\MerchantUser;

use App\Adapters\Presenters\HttpPresenter;
use App\Adapters\ViewModels\HttpResponseIViewModel;
use App\Domain\Interfaces\IViewModel;
use App\Domain\UseCases\MerchantUser\EditMerchantUser\EditMerchantUserResponseModel;
use App\Domain\UseCases\MerchantUser\EditMerchantUser\IEditMerchantUserOutputPort;
use Laracasts\Flash\Flash;

class EditMerchantUserHttpPresenter extends HttpPresenter implements IEditMerchantUserOutputPort
{
    public function editMerchantUser(EditMerchantUserResponseModel $model): IViewModel
    {
        return new HttpResponseIViewModel(
            app('view')
                ->make('backend_views.merchant_users.edit')
                ->with([
                    'merchantUser' => $model->getMerchantUser(),
                    'merchantBranches' => $model->getMerchantBranches(),
                    'merchants' => $model->getMerchants()
                ])
        );
    }

    public function unableToFindMerchantUser(): IViewModel
    {

        Flash::error(trans("messages.not_found", ['operator' => trans("messages.attributes.merchant_user")]));

        return new HttpResponseIViewModel(
            app('redirect')
                ->route(request()->get('guard') . '.merchantUsers.index')
        );
    }
}
