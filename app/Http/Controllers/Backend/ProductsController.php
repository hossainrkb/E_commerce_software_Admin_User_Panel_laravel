<?php

namespace App\Http\Controllers\Backend;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Product;
use App\Models\product_image;

use Image;
class ProductsController extends Controller
{
    public function dashboard()
    {
      return view ('backend.pages.index');
    }

    public function create()
    {
      return view ('backend.pages.product.create');
    }

    //PRODUCT EDIT
    public function edit($perameter)
    {
      $edit_pro = Product::find($perameter);
      return view ('backend.pages.product.edit')->with('e_pro',$edit_pro);
    }
    public function index()
    {
       $pro = Product::orderBy('id','desc')->get();
      return view ('backend.pages.product.index')->with('m_pro', $pro);
    }

//UPDATE PRODUCT
    public function update(Request $re,$perameter)
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
        $product->category_id=$re->category_id;
          $product->brand_id=$re->brand_id;
            $product->save();


      return redirect()->route('admin.products');
    }
//DELETE PRODUCT
    public function destroy($perameter)
    {
      $product= Product::find($perameter);
      if(!is_null($product))
      {
        $product->delete();
      }
      session()->flash('success','Successfully deleted it!');
      return back();
    }
//STORE PRODUCT

    public function store(Request $re)
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
        $product->category_id=$re->category_id;
          $product->brand_id=$re->brand_id;
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
