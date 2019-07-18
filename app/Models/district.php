<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class district extends Model
{
    public function division(){
      return $this->belongsTo(division::class);
    }
}
