<?php

namespace App\Http\Controllers\Frontend;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\User;
use Auth;
use Illuminate\Support\Facades\Hash;
use App\Models\division;
use App\Models\district;
class UsersController extends Controller
{

  //SESSION ER MOTO
  public function __construct()
  {
      $this->middleware('auth');
  }

//DASHBOARD LINK
    function dashboard(){
      $user=Auth::user();
      return view('frontend.pages.users.dashboard',compact('user'));
    }
//Profile LINK
    function profile(){
      $user=Auth::user();
      $division = division::orderBy('priority')->get();
        $district = district::orderBy('name')->get();
      return view('frontend.pages.users.profile',compact('user','division','district'));
    }

    //UPDATE USER
        public function profileUpdate(Request $re)
        {
            $user=Auth::user();
          $re->validate([
            'first_name' => 'required| string| max:100',
            'last_name' => 'nullable| string| max:100',
            'username' => 'required| alpha_dash| max:100| unique:users,username,'. $user->id,
            'email' => 'required| string| email| max:100| unique:users,email,'. $user->id,
            'division_id' =>'required|numeric',
            'district_id' =>'required|numeric',
            'phone_no' => 'required| min:11| max:11| unique:users,phone_no,'. $user->id,
            'street_address' => 'required| max:100',

      ]);




          $user->first_name= $re->first_name;
          $user->last_name= $re->last_name;
          $user->email= $re->email;
          $user->username= $re->username;
          $user->division_id= $re->division_id;
          $user->district_id= $re->district_id;
          $user->phone_no= $re->phone_no;
          $user->street_address= $re->street_address;
          $user->ip_address= request()->ip();
          if($re->password != NULL || $re->password != "" ){
            $user->password=Hash::make($re->password);
          }


                $user->save();

  session()->flash('success', 'User Profile has successfully updated!');
          return redirect()->route('user.profile');
        }
}
