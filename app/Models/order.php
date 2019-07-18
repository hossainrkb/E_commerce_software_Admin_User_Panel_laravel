<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class order extends Model
{
    public $fillable =[
      'user_id',
      'ip_address',
      'name',
      'phone_no',
      'payment_id',
      'email',
      'shipping_address',
      'message',
      'is_paid',
      'is_completed',
      'is_seen_by_admin'

  ];

  public function user(){
    return $this->belongsTo(User::class);
  }
  public function payment(){
    return $this->belongsTo(payment::class);
  }

  public function carts()
  {
    return $this->hasMany(cart ::class);
  }

}
