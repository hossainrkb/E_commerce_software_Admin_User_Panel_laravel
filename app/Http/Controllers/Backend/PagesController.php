<?php

namespace App\Http\Controllers\Backend;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Product;
use App\Models\product_image;

use Image;
class PagesController extends Controller
{
  //SESSION ER MOTO
  public function __construct()
  {
      $this->middleware('auth:admin');
  }
    public function index()
    {
      return view ('backend.pages.index');
    }


}
