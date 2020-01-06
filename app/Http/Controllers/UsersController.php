<?php

namespace App\Http\Controllers;

use App\Transaction;
use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\Rule;

class UsersController extends Controller
{
    //Showing all list of users for admin's manage user main view
    function showUsers(){
        $users = User::all();

        return view('viewusers')->with('users', $users);
    }

    //finding the specified user, and return the user edit view with that value
    function editUser($userID){
        $user = User::findOrFail($userID);
        return view('manageuser', ['user' => $user]);
    }

    //backend logic for updating user
    function editing(Request $request){
        $userID = $request->input('edited');

        //Validation based on validation.php
        $val = [
            'name' => 'required|string|min:5',
            'phone' => 'required|string|numeric|min:11',
            'address' => 'required|string|min:10',
            'gender' => 'required|in:male,female',
            'role' => 'required|in:member,admin',
            'pic' => 'required|image|mimes:jpeg, png, jpg'
        ];

        //if the updated email has different value than the old value than validate it and make sure it's unique
        if(User::find($userID)->email !== $request->input('email')){
            $val += ['email' => 'required|string|email|unique:users,email'] ;//unique
        }

        //actual validating
        $request->validate($val);

        //saving the edit
        $user = User::findOrFail($userID);
        $user->name = $request->input('name');
        $user->email = $request->input('email');
        $user->phone = $request->input('phone');
        $user->gender = $request->input('gender');
        $user->role = $request->input('role');
        $user->address = $request->input('address');

        //Moving uploaded picture to public storage, and give access with storage:link
        $picture = uniqid().$request->pic->getClientOriginalName();
        $request->pic->move(storage_path('app/public/images'), $picture);
        $user->picture = $picture;

        $user->save();

        return redirect('manageUser');
    }



    //return view for inserting user
    function insertUser(){
        return view('insertuser');
    }

    //backend logic for inserting new user
    function inserting(Request $request){
        $user = new User();

        $request->validate([
            'name' => 'required|string|min:5',
            'email' => 'required|string|email|unique:users,email', //unique
            'phone' => 'required|string|numeric|min:11',
            'password' => 'required|alpha_num|min:8|confirmed',
            'password_confirmation' => 'required',
            'address' => 'required|string|min:10',
            'gender' => 'required|in:male,female',
            'role' => 'required|in:member,admin',
            'pic' => 'required|image|mimes:jpeg, png, jpg'
        ]);

        $user->name = $request->input('name');
        $user->password = Hash::make($request->input('password'));
        $user->email = $request->input('email');
        $user->phone = $request->input('phone');
        $user->gender = $request->input('gender');
        $user->role = $request->input('role');
        $user->address = $request->input('address');

        $picture = uniqid().$request->pic->getClientOriginalName();
        $request->pic->move(storage_path('app/public/images'), $picture);
        $user->picture = $picture;

        $user->save();

        return redirect('manageUser');

    }

    //Delete user of specified user if, which's the value of the deleting button
    function deleting(Request $request){
        $userID = $request->input('deleted');
        Transaction::with(['carts' => function($query) use($userID) {
            $query->where('user_id', $userID);
        }])->delete();
        User::destroy($userID);
        return redirect('manageUser');
    }
}
