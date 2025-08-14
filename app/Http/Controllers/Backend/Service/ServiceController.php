<?php

namespace App\Http\Controllers\Backend\Service;

use App\Http\Controllers\Backend\AppBaseController;
use App\Models\Service;
use Illuminate\Http\Request;
use App\Models\About_us;
use Illuminate\Support\Facades\DB;

class ServiceController extends AppBaseController 
{

    public function __construct()
    {
        parent::__construct();
    }

    public function getCategories(Request $request)
    {
        $cat = Service::where(['parent_id' => $request->parent_id])->get();
        $res = '<option value="' . 0 . '" disabled selected>--'.trans('messages.select').'---</option>';
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
    public function getAbout()
    {
         $about = DB::table('about_us')->first();

        // Load the edit form view with the model data
        return view('backend_views.services.create', compact('about'));
    }


    public function updateAbout(Request $request)
    {
        // Validate input
        $request->validate([
            'name' => 'required|string',
            'title' => 'required|string'
        ]);
        $about = DB::table('about_us')->first();

        if ($about) {
            DB::table('about_us')
                ->where('id', $about->id)
                ->update([
                    'name' => $request->name,
                    'title' => $request->title
                ]);
        }

        return redirect()->back()->with('success', 'About Us updated successfully.');
    }


}
