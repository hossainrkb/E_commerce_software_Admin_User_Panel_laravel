<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class mypage extends Controller
{
    public function index()
    {
      return view('frontend.pages.product.my_page');
    }
}
