<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Product;
use App\Models\product_image;

use Image;
class AdminController extends Controller
{
    public function index()
    {
      return view ('backend.pages.index');
    }

    public function product_create()
    {
      return view ('backend.pages.product.create');
    }
    public function product_edit($perameter)
    {
      $edit_pro = Product::find($perameter);
      return view ('backend.pages.product.edit')->with('e_pro',$edit_pro);
    }
    public function manage_products()
    {
       $pro = Product::orderBy('id','desc')->get();
      return view ('backend.pages.product.index')->with('m_pro', $pro);
    }

//UPDATE PRODUCT
    public function product_update(Request $re,$perameter)
    {
     $re->validate([
     'title' =>           'required|max:150',
     'description' =>     'required',
     'qty' =>             'required|numeric',
     'price' =>             'required|numeric',

 ]);



      $product= Product::find($perameter);
      $product->title= $re->title;
        $product->description= $re->description;
        $product->price= $re->price;
        $product->quantity= $re->qty;
            $product->save();


      return redirect()->route('admin.products');
    }




//STORE PRODUCT

    public function product_store(Request $re)
    {
     $re->validate([
     'title' =>           'required|max:150',
     'description' =>     'required',
     'qty' =>             'required|numeric',
     'price' =>             'required|numeric',

 ]);



      $product= new Product;
      $product->title= $re->title;
        $product->description= $re->description;
        $product->slug=str_slug($re->title);
        $product->price= $re->price;
        $product->quantity= $re->qty;
        $product->category_id=1;
          $product->brand_id=1;
            $product->admin_id=1;
            $product->save();
//productimage model er kaaj
    /*
    if ($re->hasfile('pro_img')) {
      // insert image
      $image = $re->file('pro_img');
      $img=time(). '.' .$image->getClientOriginalExtension();
      $location = public_path('images/products/' . $img);
      Image:: make($image)->save($location);
      $product_img=new product_image;
      $product_img->product_id = $product->id;
      $product_img->image =$img;
      $product_img->save();

    }
    */
    if(count($re->pro_img)>0){
      foreach ($re->pro_img as $image) {
        // code...
        $img=time(). '.' .$image->getClientOriginalExtension();
        $location = public_path('images/products/' . $img);
        Image:: make($image)->save($location);
        $product_img=new product_image;
        $product_img->product_id = $product->id;
        $product_img->image =$img;
        $product_img->save();
      }
    }

      return redirect()->route('admin.product.create');
    }
}
