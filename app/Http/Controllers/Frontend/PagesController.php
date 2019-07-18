<?php

namespace App\Http\Controllers\Frontend;


use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Product;
use App\Models\product_image;
use Auth;
class PagesController extends Controller
{

   public function contact()
   {
     return view('frontend.pages.contact');
   }

   public function index()
   {
     return view('frontend.pages.index');
   }

   //SEARCHING
   public function search(Request $re)
   {
     $search = $re->pro_search;
     $holapro = Product::orWhere('title','like','%'.$search.'%')
     ->orWhere('description','like','%'.$search.'%')
     ->orWhere('price','like','%'.$search.'%')
     ->orWhere('quantity','like','%'.$search.'%')
     ->orderBy('id','desc')->paginate(9);
     return view('frontend.pages.product.search_product',compact('holapro','search'));
   }

}
