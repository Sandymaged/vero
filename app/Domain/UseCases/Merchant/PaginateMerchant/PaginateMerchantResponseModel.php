<?php

namespace App\Domain\UseCases\Merchant\PaginateMerchant;

use Illuminate\Http\JsonResponse;

class PaginateMerchantResponseModel
{
    private $merchants;

    public function __construct(
        JsonResponse $merchants
    )
    {
        $this->merchants = $merchants;
    }

    public function getMerchants(): JsonResponse
    {
        return $this->merchants;
    }
}
