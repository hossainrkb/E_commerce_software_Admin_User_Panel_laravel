<?php

namespace App\Http\Controllers\Frontend;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Auth;
use App\Models\payment;
use App\Models\order;
use App\Models\cart;

class CheckoutsController extends Controller
{
    public function index(){
      $payments = payment::orderBy('priority','asc')->get();
       return view('frontend.pages.checkouts',compact('payments'));
    }

    //STORE ORDER

        public function store(Request $re)
        {
          $re->validate([
          'name' =>           'required|max:150',
          'phone_no' =>           'required',
          'shipping_address' =>     'required',
      ],
      [
         'name.required' =>'Please provide Your name',
         'phone_no.required' => 'Phone number has to drop',
         'shipping_address.required' => 'Shipping address has to drop',
      ]);
       $order= new order;
      if($re->payment_method_id != 'cash_in'){
        if($re->transaction_id == NULL || empty($re->transaction_id) ){
          session()->flash('error','Transaction ID must have given!');
          return back();
        }
      }
      $order->name= $re->name;
      $order->email= $re->email;
      $order->phone_no= $re->phone_no;
      $order->shipping_address= $re->shipping_address;
      $order->ip_address= request()->ip();
      $order->transaction_id= $re->transaction_id;
      $order->payment_id = payment::Where('short_name',$re->payment_method_id)->first()->id;
      if(Auth::check()){
        $order->user_id = Auth::id();
      }
      $order->save();
      foreach (cart::totalCart() as $cart) {
        $cart->order_id = $order->id;
        $cart->save();
      }
        session()->flash('success','Order has been completed ! Please wait for confirmation');
      return redirect()->route("index");

        }
}
