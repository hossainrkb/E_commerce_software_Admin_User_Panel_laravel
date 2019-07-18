<?php

namespace App\Http\Controllers\Frontend;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\category;

class CategoriesController extends Controller
{

//SIDEBAR CATEGORY KAAj
    public function show($id)
    {
        $category = category::find ($id);
        if(!is_null($category)){
          return view('frontend.pages.category.show',compact('category'));
        }
        else {
            session()->flash('error','No product belongs to this category!');
          return redirect('/');
        }
    }




}
