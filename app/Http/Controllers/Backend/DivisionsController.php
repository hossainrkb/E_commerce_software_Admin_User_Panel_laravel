<?php

namespace App\Http\Controllers\Backend;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\division;
use App\Models\district;

class DivisionsController extends Controller
{

  public function index()
  {
     $get_division = division::orderBy('priority')->get();
    return view ('backend.pages.division.index', compact('get_division'));
  }
//SHOW CREATE PAGE
    public function create()
    {
        return view ('backend.pages.division.create');
    }

    //STORE DIVISION

        public function store(Request $re)
        {
         $re->validate([
         'name' =>           'required|max:150',
         'priority' =>           'required|numeric',

     ],
     [
        'name.required' =>'Please provide a division name',
        'priority.required|numeric' =>'Priority should be Numeric value',
     ]

   );
          $division= new division;
          $division->name= $re->name;
          $division->priority= $re->priority;
          $division->save();


session()->flash('success','Division Successfully Added!');
          return redirect()->route('admin.division');
        }

        //DELETE DIVISION
            public function destroy($perameter)
            {
              $division= division::find($perameter);
              if(!is_null($division))
              {
                $district=district::where('division_id',$division->id)->get();
                foreach ($district as $dis) {
                $dis->delete();
                }
                $division->delete();
              }
              session()->flash('success','Successfully deleted it!');
              return back();
            }

            //Division EDIT
            public function edit($perameter)
            {
              $edit_division = division::orderBy('id','desc')->get();
              $edit_division = division::find($perameter);
              if(!is_null($edit_division)){
                return view ('backend.pages.division.edit', compact('edit_division'));
              }
              else{
                  return redirect()->route('admin.division');
              }
            }


            //UPDATE DIVISION
                public function update(Request $re,$perameter)
              {
                  $re->validate([
                'name' =>           'required|max:150',
                'priority' =>           'required|numeric',

            ],
            [
               'name.required' =>'Please provide a division name',
               'priority.required|numeric' =>'Priority should be Numeric value',
            ]

          );
          $division = division::find($perameter);
          $division->name= $re->name;
          $division->priority= $re->priority;
          $division->save();

          return redirect()->route('admin.division');
          }


}
