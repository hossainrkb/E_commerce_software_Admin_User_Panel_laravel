<?php

namespace App\Http\Controllers\Backend;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\order;
use PDF;
class OrdersController extends Controller
{
  //SESSION ER MOTO
  public function __construct()
  {
      $this->middleware('auth:admin');
  }

  public function index()
  {
     $odrs = order::orderBy('id','desc')->get();
    return view ('backend.pages.order.index', compact('odrs'));
  }
  //View Order
  public function show($id)
  {
     $odr = order::find($id);
     $odr->is_seen_by_admin=1;
     $odr->save();
    return view ('backend.pages.order.show', compact('odr'));
  }
  //DELETE ORDER
      public function destroy($perameter)
      {
       $odr = order::find($perameter);
        if(!is_null($odr))
        {

          $odr->delete();
        }
        session()->flash('success','Successfully deleted it!');
        return back();
      }
  //Completed ORDER
      public function completed($perameter)
      {
       $odr_com = order::find($perameter);
        if($odr_com->is_completed==1)
        {
          $odr_com->is_completed = 0;
            session()->flash('success','Order cenceled Successfully!');
        }
        else{
          $odr_com->is_completed = 1;
            session()->flash('success','Order Completed Successfully!');
        }
        $odr_com->save();

        return back();
      }
  //Paid ORDER
      public function paid($perameter)
      {
       $odr_paid = order::find($perameter);
        if($odr_paid->is_paid==1)
        {
          $odr_paid->is_paid = 0;
            session()->flash('success','cenceled Paid !');
        }
        else{
          $odr_paid->is_paid = 1;
            session()->flash('success','Paid Successfully!');
        }
        $odr_paid->save();

        return back();
      }
  //Charge ADDED
      public function chargeOrder(Request $re,$perameter)
      {
       $odr = order::find($perameter);
       $odr->shipping_charge= $re->shipping_charge;
       $odr->custom_discount= $re->custom_discount;
        $odr->save();
        session()->flash('success','Order charge and discount has been added Successfully!');
        return back();
      }
  //Invoice generate
      public function generateInvoice($perameter)
      {
       $odr = order::find($perameter);
      // return view('backend.pages.order.invoice', compact('odr'));
       $pdf = PDF::loadView('backend.pages.order.invoice', compact('odr'));
       return $pdf->download('invoice.pdf');
      }
}
