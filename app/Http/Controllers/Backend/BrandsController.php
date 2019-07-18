<?php

namespace App\Http\Controllers\Backend;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\brand;
use Image;
use File;
class BrandsController extends Controller
{
  public function index()
  {
     $get_brand = brand::orderBy('id','desc')->get();
    return view ('backend.pages.brand.index', compact('get_brand'));
  }

  //DELETE CATEGORY
      public function destroy($perameter)
      {
        $brand= brand::find($perameter);
        if(!is_null($brand))
        {
          //Delete brand Image
          if(File::exists('images/brands/' . $brand->image)){
            File::delete('images/brands/' . $brand->image);
          }
          $brand->delete();
        }
        session()->flash('success','Successfully deleted it!');
        return back();
      }
//SHOW CREATE PAGE
      public function create()
      {
        $cat = brand::orderBy('name','desc')->get();
        return view ('backend.pages.brand.create', compact('cat'));
      }

      //STORE BRAND

          public function store(Request $re)
          {
           $re->validate([
           'name' =>           'required|max:150',

       ],
       [
          'name.required' =>'Please provide a brand name',
       ]

     );
            $brand= new brand;
            $brand->name= $re->name;
            $brand->description= $re->description;

            if ($re->hasfile('brand_img')) {
              // insert image
              $image = $re->file('brand_img');
              $img=time(). '.' .$image->getClientOriginalExtension();
              $location = public_path('images/brands/' . $img);
              Image:: make($image)->save($location);

              $brand->image=$img;
            }
            $brand->save();


  session()->flash('success','Brand Successfully Added!');
            return redirect()->route('admin.brand');
          }

          //BAND EDIT
          public function edit($perameter)
          {
            $m_brand = brand::orderBy('name','desc')->get();
            $edit_brand = brand::find($perameter);
            if(!is_null($edit_brand)){
              return view ('backend.pages.brand.edit', compact('edit_brand'));
            }
            else{
                return redirect()->route('admin.brand');
            }
          }

          //UPDATE BRAND
              public function update(Request $re,$perameter)
              {
               $re->validate([
               'name' =>           'required',



           ]);
                $brand= brand::find($perameter);
                $brand->name= $re->name;
                  $brand->description= $re->description;

                  if ($re->hasfile('brand_img')) {
                    if(File::exists('images/brands/' . $brand->image)){
                      File::delete('images/brands/' . $brand->image);
                    }

                    // insert image
                    $image = $re->file('brand_img');
                    $img=time(). '.' .$image->getClientOriginalExtension();
                    $location = public_path('images/brands/' . $img);
                    Image:: make($image)->save($location);

                    $brand->image=$img;
                  }
                      $brand->save();


                return redirect()->route('admin.brand');
              }

}
