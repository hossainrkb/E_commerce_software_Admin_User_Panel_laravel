<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    public function images()
    {
      return $this->hasMany(product_image::class);
    }
    public function category()
    {
      return $this->belongsTo(category::class);
    }
    public function brand()
    {
      return $this->belongsTo(brand::class);
    }
}
