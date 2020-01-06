<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Validation\Rule;

class ProfileController extends Controller
{
    function showProfile(){
        //Get current authenticated user, and return profile view for that specific user
        $user = Auth::user();
        return view('myprofile', ['user'=> $user]);
    }

    function editing(Request $request){
        //For the current authenticated user
        $user = Auth::user();

        //validate inputs
        $val = [
            'name' => 'required|string|min:5',
            'phone' => 'required|string|numeric|min:11',
            'address' => 'required|string|min:10',
            'gender' => 'required|in:male,female',
            'pic' => 'required|image|mimes:jpeg,png,jpg'
        ];

        //if email is edited, validate that too
        if($user->email !== $request->input('email')){
            $val += ['email' => 'required|string|email|unique:users,email'] ;//unique
        }

        $request->validate($val);

        //update the current user info
        $user->name = $request->input('name');
        $user->email = $request->input('email');
        $user->phone = $request->input('phone');
        $user->gender = $request->input('gender');
        $user->address = $request->input('address');

        $picture = uniqid().$request->pic->getClientOriginalName();
        $request->pic->move(storage_path('app/public/images'), $picture);
        $user->picture = $picture;

        $user->save();

        //redirect on finish
        return redirect('profile');
    }
}
