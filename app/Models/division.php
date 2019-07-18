<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class division extends Model
{
  public function district(){
    return $this->hasMany(district::class);
  }
}
