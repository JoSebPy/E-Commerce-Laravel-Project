<?php

namespace App\Http\Controllers;

use App\Cart;
use App\Transaction;
use Illuminate\Http\Request;
use App\Figure;
use Illuminate\Support\Facades\Auth;

class CartController extends Controller
{
    /*
     * Return the view for member's cart page with the user's cart that are active
     */

    //return active carts of current authenticated user on cart list view
    function getFigures(){
        $user = Auth::user()->id;

        $carts = Cart::where('user_id', $user)->where('cart_active', true)->get();

        return view('mycart')->with('carts', $carts);
    }

    //function to decide which function to be used based on input key
    function funcDecider(Request $request){
        if($request->has('removed')){
            $this->removeItem($request);
        }
        elseif($request->has('checkout')){
            $this->checkOut();
        }
        return redirect('cart');
    }

    //function to remove item based on specified value
    function removeItem(Request $request){
        $item = $request->input('removed');

        Cart::destroy($item);

    }

    //function to checkout user's current cart, which means creating a new transaction, deactivate the cart, reference this cart items to the
    //new transaction, and reducing the figure's stock
    function checkOut(){
        $user = Auth::user()->id;

        //check for current user active cart items
        $figQ = Cart::where('user_id', $user)->where('cart_active', true);
        $figs = $figQ->get();

        //if none, redirect back
        if(empty($figs)){
            return redirect('cart');
        }

        //else create a new transaction (this would auto generate timestamps)
        $trans = new Transaction();
        $trans->save();
        $trans->refresh();

        //for every active cart items
        foreach($figs as $fig){
            //reference this cart to the new transaction id
            $fig->trans_id = $trans->trans_id;
            $fig->save();

            //reduce figure stock for every cart
            $stock = Figure::find($fig->fig_id);
            $stock->fig_stock -= $fig->cart_qty;
            $stock->save();
        }
        //update user's active cart to not active
        $figQ->update(['cart_active' => false]);
    }

}
