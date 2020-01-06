<?php

namespace App\Http\Controllers;

use App\Transaction;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class TransactionController extends Controller
{
    //Show all transaction that the cart(s) with the current user's id reference to. The cart table contains a nullable column referencing
    //a transaction id for every transaction
    function showTrans(){
        $trans = Transaction::with(['cart' => function($query) {
            $query->where('user_id', Auth::user()->id);
        }])->paginate(1);
        return view('mytransaction', ['transaction' => $trans]);
    }

    function allTrans(){
        //Show all transaction
        $trans = Transaction::paginate(1);
        if(empty($trans)){
            $trans = [null];
        }

        return view('viewtransactions', ['transaction' => $trans]);
    }

}
