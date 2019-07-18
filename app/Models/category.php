<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class category extends Model
{
    public function p()
    {
      return $this->belongsTo(category ::class,'parent_id');
    }
    public function product()
    {
      return $this->hasMany(Product ::class);
    }

    //Active dekharnur jonno
    public static function parentornot($parent_id, $child_id)
    {
    $categories = category:: where ('id', $child_id)->where('parent_id', $parent_id)->get();
    if(!is_null($categories)){
      return True;
    }
    else{
      return False;
    }
    }
}
