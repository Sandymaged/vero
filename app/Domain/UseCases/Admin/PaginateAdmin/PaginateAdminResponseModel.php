<?php

namespace App\Domain\UseCases\Admin\PaginateAdmin;

use Illuminate\Http\JsonResponse;

class PaginateAdminResponseModel
{
    private $admins;

    public function __construct(
        JsonResponse $admins
    )
    {
        $this->admins = $admins;
    }

    public function getAdmins(): JsonResponse
    {
        return $this->admins;
    }
}
