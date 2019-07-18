<?php

namespace App\Http\Controllers\Backend;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\division;
use App\Models\district;
class DistrictController extends Controller
{

  public function index()
  {
  $district = district::orderBy('name')->get();
    return view ('backend.pages.district.index', compact('district'));
  }

  //SHOW CREATE PAGE
        public function create()
        {
          $division = division::orderBy('priority')->get();
          return view ('backend.pages.district.create', compact('division'));
        }

        //STORE District

            public function store(Request $re)
            {
             $re->validate([
             'name' =>           'required|max:150',
             'division_id' =>           'required',

         ],
         [
            'name.required' =>'Please provide a district name',
            'division_id.required' => 'You"ve to select one listed division from here ',


         ]

       );
              $district= new district;
              $district->name= $re->name;
              $district->division_id= $re->division_id;
              $district->save();


    session()->flash('success','District Successfully Added!');
              return redirect()->route('admin.district');
            }

            //DELETE District
                public function destroy($perameter)
                {
                  $district= district::find($perameter);
                  if(!is_null($district))
                  {
                    $district->delete();
                  }
                  session()->flash('success','Successfully deleted it!');
                  return back();
                }

                //District EDIT
                public function edit($perameter)
                {
                    $division = division::orderBy('priority')->get();
                $edit_district= district::find($perameter);
                  if(!is_null($edit_district)){
                    return view ('backend.pages.district.edit', compact('edit_district','division'));
                  }
                  else{
                      return redirect()->route('admin.district');
                  }
                }

                //UPDATE DISTRICT
                    public function update(Request $re,$perameter)
                    {
                      $re->validate([
                      'name' =>           'required|max:150',
                      'division_id' =>           'required',

                  ],
                  [
                     'name.required' =>'Please provide a district name',
                     'division_id.required' => 'You"ve to select one listed division from here ',


                  ]

                );
                $district= district::find($perameter);
                $district->name= $re->name;
                $district->division_id= $re->division_id;
                $district->save();


                session()->flash('success','District Successfully Edited!');
                          return redirect()->route('admin.district');
                    }
}
