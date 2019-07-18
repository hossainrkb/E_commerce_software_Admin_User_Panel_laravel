<?php

namespace App\Http\Controllers\Auth;

use App\Models\User;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use Illuminate\Foundation\Auth\RegistersUsers;
use App\Models\division;
use App\Models\district;
use App\Notifications\VerifyRegistration;
use Illuminate\Http\Request;

class RegisterController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Register Controller
    |--------------------------------------------------------------------------
    |
    | This controller handles the registration of new users as well as their
    | validation and creation. By default this controller uses a trait to
    | provide this functionality without requiring any additional code.
    |
    */

    use RegistersUsers;

    /**
     * Where to redirect users after registration.
     *
     * @var string
     */
    protected $redirectTo = '/';

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest');
    }
    /*
    @override korsi
    Display the registration form.
     * @return void
    */
    public function showRegistrationForm()
    {
        $division = division::orderBy('priority')->get();
          $district = district::orderBy('name')->get();
        return view('auth.register',compact('division','district'));
    }
    /**
     * Get a validator for an incoming registration request.
     *
     * @param  array  $data
     * @return \Illuminate\Contracts\Validation\Validator
     */
    protected function validator(array $data)
    {
        return Validator::make($data, [
            'first_name' => ['required', 'string', 'max:100'],
            'last_name' => ['nullable', 'string', 'max:100'],
            'email' => ['required', 'string', 'email', 'max:255', 'unique:users'],
            'password' => ['required', 'string', 'min:6', 'confirmed'],
            'division_id' =>['required','numeric'],
            'district_id' =>['required','numeric'],
            'phone_no' => ['required', 'string', 'min:11', 'max:11'],
            'street_address' => ['required', 'max:100'],
        ]);
    }

    /**
     * Create a new user instance after a valid registration.
     *
     * @param  array  $data
     * @return \App\User
     */
    protected function register(Request $re)
    {
        $user = User::create([
            'first_name' => $re->first_name,
            'last_name' => $re->last_name,
            'username' => str_slug($re->last_name.$re->first_name),
            'phone_no' => $re->phone_no,
            'division_id' => $re->division_id,
            'district_id' => $re->district_id,
            'street_address' => $re->street_address,
            'ip_address' => request()->ip(),
            'email' => $re->email,
            'password' => Hash::make($re->password),
            'remember_token' => str_random(50),
            'status' => 0,
        ]);
        $user->notify(new VerifyRegistration($user));
        session()->flash('success', 'A confermation message has sent to you... please confirm it!');

        return redirect('/');
    }
}
