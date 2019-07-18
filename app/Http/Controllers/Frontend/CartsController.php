<?php

namespace App\Http\Controllers\Frontend;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\cart;
use App\Models\order;
use Auth;
class CartsController extends Controller
{

public function index(){
  return view('frontend.pages.cart');
}

  public function store(Request $re)
  {

    $re->validate([
    'product_id' =>           'required'
],
[
   'product_id.required' =>'Please provide a Product'
]);


if(Auth::check()){
  $cart = cart::Where('user_id', Auth::id()  )
  ->Where('ip_address', request()->ip() )
  ->where('product_id',$re->product_id)
  ->where('order_id',NULL)
  ->first();
}
else{
  $cart = cart::Where('ip_address', request()->ip() )
  ->where('product_id',$re->product_id)
  ->where('order_id',NULL)
  ->first();

}

    if(!is_null($cart)){
      $cart->increment('product_quantity');
    }
    else{
      $cart = new cart();
      if(Auth::check()){
        $cart->user_id = Auth::id();
      }

      $cart->ip_address=request()->ip();
      $cart->product_id=$re->product_id;
      //$cart->product_quantity=$re->product_quantity;
      $cart->save();
    }



    session()->flash('success', 'Product has added to cart!');
    return back();

    //else{
//auth er check ta
    //}
  }


  //UPDATE CART QUANTITY
      public function update(Request $re,$perameter)
      {
       $re->validate([
       'product_quantity' =>'numeric'
   ]);
        $cart = cart::find($perameter);
        if(!is_null($cart)){

          $cart->product_quantity= $re->product_quantity;
          $cart->save();
        }
        else{
          return redirect()->route('carts');
        }
        session()->flash('success', 'Cart has updated!');
        return back();
      }

      //DELETE CART
          public function destroy($perameter)
          {
            $cart= cart::find($perameter);
            if(!is_null($cart))
            {

              $cart->delete();
            }
            session()->flash('success','Successfully deleted it!');
            return back();
          }
}
