<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class isThisRole
{
    //Check if the user is authenticated to given roles. Every user has a role field, specified in the role column in the users table.
    public function handle($request, Closure $next, ...$roles)
    {

        //check if user agent is authenticated as a user model
        if (Auth::guard()->check()) {

            //see parameter for what role string should be verified
            //if parameter is empty then just initialize empty array
            if (empty($roles))
                $roles = [null];

            //for each value/key passed by parameter, check if at least one of those value meet the user's role, then accept it
            foreach ($roles as $role)
                if (Auth::user()->role === $role) return $next($request);
        }

        //if none, then reject and "secure" with obfuscation
        return abort(404);
    }
}
