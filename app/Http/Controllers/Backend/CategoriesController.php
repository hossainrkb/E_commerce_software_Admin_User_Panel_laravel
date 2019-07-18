<?php

namespace App\Http\Controllers\Backend;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\category;
use Image;
use File;
class CategoriesController extends Controller
{
  public function index()
  {
     $cat = category::orderBy('id','desc')->get();
    return view ('backend.pages.category.index', compact('cat'));
  }

  //DELETE CATEGORY
      public function destroy($perameter)
      {
        $category= category::find($perameter);
        if(!is_null($category))
        {
          //If it is parent category then delete it's sub category
          if ($category->parent_id == NULL ) {
            //delete sub
             $sub_cat = category::orderBy('id','desc')->where('parent_id',$category->id )->get();
             foreach ($sub_cat as $sub) {
               //Delete sub Category Image
               if(File::exists('images/categories/' . $sub->image)){
                 File::delete('images/categories/' . $sub->image);
               }
               $sub->delete();
             }
          }


          //Delete Category Image
          if(File::exists('images/categories/' . $category->image)){
            File::delete('images/categories/' . $category->image);
          }
          $category->delete();
        }
        session()->flash('success','Successfully deleted it!');
        return back();
      }
//SHOW CREATE PAGE
      public function create()
      {
        $cat = category::orderBy('name','desc')->get();
        return view ('backend.pages.category.create', compact('cat'));
      }

      //STORE CATEGORY

          public function store(Request $re)
          {
           $re->validate([
           'name' =>           'required|max:150',
           'cat_img' =>           'nullable|image',
           'description' =>     'required',


       ],
       [
          'name.required' =>'Please provide a category name',
          'cat_img.image' => 'Image file should be jpg OR png',


       ]

     );
            $category= new category;
            $category->name= $re->name;
            $category->description= $re->description;
            $category->parent_id= $re->parent_id;
            if ($re->hasfile('cat_img')) {
              // insert image
              $image = $re->file('cat_img');
              $img=time(). '.' .$image->getClientOriginalExtension();
              $location = public_path('images/categories/' . $img);
              Image:: make($image)->save($location);

              $category->image=$img;
            }
            $category->save();


  session()->flash('success','Category Successfully Added!');
            return redirect()->route('admin.categories');
          }

          //Category EDIT
          public function edit($perameter)
          {
            $cat = category::orderBy('name','desc')->get();
            $edit_cat = category::find($perameter);
            if(!is_null($edit_cat)){
              return view ('backend.pages.category.edit', compact('edit_cat','cat'));
            }
            else{
                return redirect()->route('admin.categories');
            }
          }

          //UPDATE CATEGORY
              public function update(Request $re,$perameter)
              {
               $re->validate([
               'name' =>           'required',
               'description' =>     'required',


           ]);
                $category= category::find($perameter);
                $category->name= $re->name;
                  $category->description= $re->description;
                  $category->parent_id= $re->parent_id;
                  if ($re->hasfile('cat_img')) {
                    if(File::exists('images/categories/' . $category->image)){
                      File::delete('images/categories/' . $category->image);
                    }



                    // insert image
                    $image = $re->file('cat_img');
                    $img=time(). '.' .$image->getClientOriginalExtension();
                    $location = public_path('images/categories/' . $img);
                    Image:: make($image)->save($location);

                    $category->image=$img;
                  }
                      $category->save();


                return redirect()->route('admin.categories');
              }

}
