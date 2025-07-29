<?php

namespace App\Adapters\Presenters;

use App\Adapters\ViewModels\HttpResponseIViewModel;
use App\Domain\Interfaces\IViewModel;
use Laracasts\Flash\Flash;

class HttpPresenter
{

    public function error(\Throwable $e): IViewModel
    {
        if (config('app.debug')) {
            // rethrow and let Laravel display the error
            throw $e;
        }

        Flash::error(trans("messages.error_occurred"));

        return new HttpResponseIViewModel(
            app('redirect')
                ->back()
        );
    }
}
