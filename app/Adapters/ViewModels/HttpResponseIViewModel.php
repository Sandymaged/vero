<?php

namespace App\Adapters\ViewModels;

use App\Domain\Interfaces\IViewModel;
use Illuminate\Http\Response as LaravelResponse;
use Illuminate\View\View;
use Symfony\Component\HttpFoundation\Response as HttpResponse;

class HttpResponseIViewModel implements IViewModel
{
    /**
     * @var HttpResponse|LaravelResponse|View
     */
    private $response;

    public function __construct($response)
    {
        if ($response instanceof View) {
            $response = new LaravelResponse($response);
        }

        $this->response = $response;
    }

    public function getResponse(): HttpResponse
    {
        return $this->response;
    }
}
