<?php

namespace App\Http\Controllers\Frontend;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Product;
use Auth;
class ProductsController extends Controller
{


  public function index()
  {
    $pro = Product::orderBy('id','desc')->paginate(9);
    return view('frontend.pages.product.index')->with('holapro',$pro);
  }

  //SLUG THEKE LINK, DETAILS DEKTESI
  public function show($slug)
  {
  $product = Product:: where('slug',$slug)->first();
  if (!is_null($product)) {
    return view('frontend.pages.product.show', compact('product'));
  }
  else {
    session()->flash('error', 'Sorry no product contains this URL!');
    return redirect()->route('index');
  }
  }

}
