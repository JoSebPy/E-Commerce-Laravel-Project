<?php

namespace App\Http\Controllers\Auth;

use App\User;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use Illuminate\Foundation\Auth\RegistersUsers;
use Illuminate\Validation\Rule;
use function Illuminate\Support\Arr;

class RegisterController extends Controller
{
    use RegistersUsers;
    protected $redirectTo = '/home';

    public function __construct() { $this->middleware('guest'); }

    protected function validator(array $data) {
        return Validator::make($data, [
            'name' => 'required|string|min:5',
            'email' => 'required|string|email|unique:users,email', //unique
            'password' => 'required|alpha_num|min:8|confirmed',
            'password_confirmation' => 'required',
            'phone-number' => 'required|digits:11',
            'address' => 'required|string|min:10',
            'gender' => 'required|in:male,female',
            'profile-pic' => 'required|image|mimes:jpeg,png,jpg',
            'terms_and_conditions'=> 'accepted'
        ]);
    }

    protected function create(array $data) {
       $picture = uniqid().$data['profile-pic']->getClientOriginalName();
       $data['profile-pic']->move(storage_path('app/public/images'), $picture);
       $data['profile-pic'] = $picture;
        return User::create([
            'name' => $data['name'],
            'email' => $data['email'],
            'password' => Hash::make($data['password']),
            'address' => $data['address'],
            'phone' => $data['phone-number'],
            'gender' => $data['gender'],
            'picture' => $data['profile-pic']
        ]);

    }
}
