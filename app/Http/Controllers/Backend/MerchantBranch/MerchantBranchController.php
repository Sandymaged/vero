<?php

namespace App\Http\Controllers\Backend\MerchantBranch;

use App\Http\Controllers\Backend\AppBaseController;
use App\Models\MerchantBranch;
use Illuminate\Http\Request;

class MerchantBranchController extends AppBaseController
{

    public function __construct()
    {
        parent::__construct();
    }

    public function getBranches(Request $request)
    {
        $cat = MerchantBranch::where(['merchant_id' => $request->merchant_id])->get();
        $res = '<option value="' . 0 . '" disabled selected>--'.trans('messages.select').'---</option>';
        foreach ($cat as $row) {
            if ($row->id == $request->branch) {
                $res .= '<option value="' . $row->id . '" selected >' . $row->name . '</option>';
            } else {
                $res .= '<option value="' . $row->id . '">' . $row->name . '</option>';
            }
        }
        return response()->json([
            'select_tag' => $res,
        ]);
    }
}
