<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Auth;
class cart extends Model
{
  public $fillable =[
    'user_id',
    'order_id',
    'product_id',
    'ip_address',
    'product_quantity'

];

public function user(){
  return $this->belongsTo(User::class);
}
public function order(){
  return $this->belongsTo(order::class);
}
public function product(){
  return $this->belongsTo(Product::class);
}

/*
Total cart item return korbe
*/
public static function totalCart(){
  if(Auth::check()){
    $cart = cart::Where('user_id', Auth::id()  )
    ->Where('order_id',NULL)
    ->get();
  }
  else{
    $cart = cart::Where('ip_address', request()->ip() )
    ->Where('order_id',NULL)
    ->get();
  }

  return $cart;

}

/*
total item quantity
retun integer
*/
public static function totalItem(){
  if(Auth::check()){
    $cart = cart::Where('user_id', Auth::id()  )
    ->Where('order_id',NULL)
    ->get();
  }
  else{
    $cart = cart::Where('ip_address', request()->ip() )
    ->Where('order_id',NULL)
    ->get();
  }
  $totalItem=0;
  foreach ($cart as  $value) {
    $totalItem += $value->product_quantity;
  }
  return $totalItem;

}


}
