<?php

namespace App\Http\Controllers\Backend\Merchant;

use App\Adapters\ViewModels\HttpResponseIViewModel;
use App\Domain\UseCases\Merchant\ListMerchant\IListMerchantInputPort;
use App\Domain\UseCases\Merchant\ListMerchant\ListMerchantRequestModel;
use App\Http\Controllers\Backend\AppBaseController;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response as HttpResponse;
use Illuminate\Support\Facades\DB;

class ListMerchantController extends AppBaseController
{
    private $interactor;

    public function __construct(
        IListMerchantInputPort $interactor
    )
    {
        $this->interactor = $interactor;

        parent::__construct();
    }

    public function __invoke(Request $request): ?HttpResponse
    {
        $viewModel = $this->interactor->listMerchant(
            new ListMerchantRequestModel($request->page)
        );

        // we can't force the interactor to return an HttpResponseIViewModel
        // so we need a simple check (or PHPStan will yell)
        if ($viewModel instanceof HttpResponseIViewModel) {
            return $viewModel->getResponse();
        }

        return null;
    }
    public function merchantsIndex()
    {
        $merchants = DB::table('market')
        ->leftJoin('brands', 'market.market_cat_id', '=', 'brands.id')
        ->select('market.*', 'brands.name as brand_name')
        ->get();

        return view('backend_views.merchants.index', compact('merchants'));
    }
    public function create()
    {
        $brands = DB::table('brands')
        ->pluck('name', 'id'); // id => name

        return view('backend_views.merchants.create', compact('brands'));
    }

public function store(Request $request)
{
    // Validate inputs
    $validatedData = $request->validate([
        'name'  => 'required|string|max:255',
        'logo' => 'nullable|image|mimes:jpg,jpeg,png|max:2048', // 2MB max
        'market_cat_id'=> 'required'
    ]);


    // Handle image if provided
    //   dd($request->image);
   if ($request->hasFile('logo')) {
        $imageName = time() . '.' . $request->logo->extension(); // logo, not image
        $request->logo->move(public_path('uploads/market'), $imageName);
        $logo = 'uploads/market/' . $imageName; // store path in DB
    } else {
        $logo = null; // or keep old value if update
    }

    DB::table('market')->insert([
        'name' => $validatedData['name'],
        'image_path' => $logo,
        'market_cat_id'=>$validatedData['market_cat_id'],
        'created_at' => now(),
        'updated_at' => now(),
    ]);

//   dd('ttest');
    return redirect()->back()->with('success', 'Market created successfully.');
}

public function delete($id)
{
    // Get the logo path before deleting
    $market = DB::table('market')->where('id', $id)->first();

    if ($market) {
        // Delete the file if it exists
        if ($market->image_path && file_exists(public_path($market->image_path))) {
            unlink(public_path($market->image_path));
        }

        // Delete the record from DB
        DB::table('market')->where('id', $id)->delete();

        return redirect()->back()->with('success', 'Market deleted successfully.');
    }

    return redirect()->back()->with('error', 'Market not found.');
}


}
