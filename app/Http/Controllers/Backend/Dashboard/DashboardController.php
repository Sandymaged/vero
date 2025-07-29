<?php

namespace App\Http\Controllers\Backend\Dashboard;

use App\Http\Controllers\Backend\AppBaseController;
use Illuminate\Http\Request;

class DashboardController extends AppBaseController
{

    public function __construct()
    {
        parent::__construct();
    }

    public function dashboard(Request $request)
    {
        return view('backend_views.dashboard.index');
    }
}
