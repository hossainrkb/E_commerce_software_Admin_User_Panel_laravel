<?php

namespace App\Http\Controllers\Auth\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use App\Models\admin;
use App\Notifications\VerifyRegistration;
use Auth;
use App\Models\cart;
use Illuminate\Http\Request;
class LoginController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Login Controller
    |--------------------------------------------------------------------------
    |
    | This controller handles authenticating users for the application and
    | redirecting them to your home screen. The controller uses a trait
    | to conveniently provide its functionality to your applications.
    |
    */

    use AuthenticatesUsers;

    /**
     * Where to redirect users after login.
     *
     * @var string
     */
    protected $redirectTo = '/admin';

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest')->except('logout');
        //return redirect()->route('admin.dash');
    }

    public function showLoginForm()
    {
        return view('auth.admin.login');
    }

    public function login(Request $request)
    {

      $request->validate([
          'email' => 'required|email',
          'password' => 'required|string',

      ]);
      //FIND USER BY EMAIL
      $admin = admin::where('email',  $request->email)->first();
  if($admin){
      //Login korte parbe
      if(Auth :: guard ('admin') ->attempt(['email'=>$request->email , 'password' =>$request->password ] , $request->remember) ){
      return redirect()->intended(route('admin.dash'));
    }
    else {
      // code...
      session()->flash('error', 'Invalid Login!');
        return redirect()->route("admin.login");
    }


  }
  else {
      session()->flash('error', 'No admin belongs to this email id');
    return redirect()->route("admin.login");

  }
    }


    public function logout(Request $request)
    {
        $this->guard()->logout();

        $request->session()->invalidate();

        return redirect()->route("admin.login");
    }
}
