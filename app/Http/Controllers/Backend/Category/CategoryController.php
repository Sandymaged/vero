<?php

namespace App\Http\Controllers\Backend\Category;

use App\Http\Controllers\Backend\AppBaseController;
use App\Models\Category;
use App\Scopes\CategoryScope;
use Illuminate\Http\Request;

class CategoryController extends AppBaseController
{

    public function __construct()
    {
        parent::__construct();
    }

    public function getCategories(Request $request)
    {
        $cat = Category::withoutGlobalScope(CategoryScope::class)->where(['parent_id' => $request->parent_id])->get();
        $res = '<option value="' . 0 . '" disabled selected>--' . trans('messages.select') . '---</option>';
        foreach ($cat as $row) {
            if ($row->id == $request->subcategory) {
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
