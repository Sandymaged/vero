<?php

namespace App\Http\Controllers\Backend\Offer;

use App\Adapters\ViewModels\HttpResponseIViewModel;
use App\Domain\UseCases\Offer\ListOffer\IListOfferInputPort;
use App\Domain\UseCases\Offer\ListOffer\ListOfferRequestModel;
use App\Http\Controllers\Backend\AppBaseController;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response as HttpResponse;
use Illuminate\Support\Facades\DB;

class ListOfferController extends AppBaseController
{
    private $interactor;

    // public function __construct(
    //     IListOfferInputPort $interactor
    // )
    // {
    //     $this->interactor = $interactor;

    //     parent::__construct();
    // }

    // public function __invoke(Request $request): ?HttpResponse
    // {
    //     $viewModel = $this->interactor->listOffer(
    //         new ListOfferRequestModel($request->page)
    //     );

    //     // we can't force the interactor to return an HttpResponseIViewModel
    //     // so we need a simple check (or PHPStan will yell)
    //     if ($viewModel instanceof HttpResponseIViewModel) {
    //         return $viewModel->getResponse();
    //     }

    //     return null;
    // }
    public function ProductIndex()
    {
        $offers = DB::table('products')
        ->select('products.*')
        ->get();

        return view('backend_views.offers.index', compact('offers'));
    }
    public function delete($id)
{
    // Get the logo path before deleting
    $market = DB::table('products')->where('id', $id)->first();

    if ($market) {      
        // Delete the record from DB
        DB::table('products')->where('id', $id)->delete();

        return redirect()->back()->with('success', 'product deleted successfully.');
    }

    return redirect()->back()->with('error', 'product not found.');
}
public function store(Request $request)
{
    // Validate inputs
    $validatedData = $request->validate([
        'name'  => 'required|string|max:255',
        'logo' => 'nullable|image|mimes:jpg,jpeg,png|max:2048', // 2MB max
        'category_id'=> 'required',
        'subcategory_id'=>'required',
        'extra_details' =>'required'
    ]);


    // Handle image if provided
    //   dd($request->image);
   if ($request->hasFile('image')) {
        $imageName = time() . '.' . $request->image->extension(); // image, not image
        $request->image->move(public_path('uploads/products'), $imageName);
        $image = 'uploads/products/' . $imageName; // store path in DB
    } else {
        $image = null; // or keep old value if update
    }

    DB::table('products')->insert([
        'name' => $validatedData['name'],
        'image1' => $image,
        'category_id'=>$validatedData['category_id'],
        'sub_id'=>$validatedData['subcategory_id'],
        'description'=>$validatedData['extra_details'],
        'created_at' => now(),
        'updated_at' => now(),
    ]);

//   dd('ttest');
    return redirect()->back()->with('success', 'Market created successfully.');
}
}
