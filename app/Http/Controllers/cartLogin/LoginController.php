<?php

namespace App\Http\Controllers\cartLogin;

use App\Http\Controllers\Controller;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use App\Models\User;
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
    //protected $redirectTo = '';

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest')->except('logout');
    }
    public function showLoginForm()
    {
        return view('frontend.cartLogin.login');
    }

    public function login(Request $request)
    {
      $request->validate([
          'email' => 'required|email',
          'password' => 'required|string',

      ]);
      //FIND USER BY EMAIL
      $user = User::where('email',  $request->email)->first();
  if($user){
    if($user->status == 1){
      //Login korte parbe
      if(Auth :: guard ('web') ->attempt(['email'=>$request->email , 'password' =>$request->password ] , $request->remember) ){
        $check_cart = cart::where('ip_address',  request()->ip() )
        ->Where('user_id',  NULL )
        ->get();
        foreach ($check_cart as $value) {
          $value->user_id=Auth::id();
          $value->save();
        }

      return redirect()->intended(route('carts'));
    }
    else {
      // code...
      session()->flash('error', 'Invalid Login!');
      return redirect('login');
    }
    }
    else {
      // parbe na
      //Send him a token again
      if(!is_null($user)){
          $user->notify(new VerifyRegistration($user));
          session()->flash('success', 'A New confermation message has sent to you... please confirm it!');
          return redirect('/');
      }
      else{
        session()->flash('error', 'No user belongs to this email id');
      }
    }
  }
  else {
      session()->flash('error', 'No user belongs to this email id');
    return redirect('login');

  }
    }
}
