<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Illuminate\Http\Request;
use App\User;

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
    protected $redirectTo = '/';

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware(  'guest')->except('logout');
    }
/*
    public function loginAttempt(Request $request){
        $username = request("email");
        $password = request("password");

        $exist = User::where('email', 'like', "%$username");

        if($exist != null){
            $checkpw = password_verify($password, $exist->mem_password);
            if($password == $exist->mem_password){
                $request->session()->put('id', $exist->mem_id);
                $request->session()->put('role', 'member');

                route('home');
            }
            else {
                route('login');
            }
        }else{
            route('login');
        }

    }*/
}
