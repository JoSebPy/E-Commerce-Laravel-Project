<?php

namespace App\Http\Controllers;

use App\Cart;
use App\Category;
use Illuminate\Http\Request;
use App\Figure;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use phpDocumentor\Reflection\DocBlock\Tags\Uses;

class HomeController extends Controller
{
    public function __construct()
    {
    }

    //Showing all available figures
    function getItems()
    {
        //Get search key input to display asked figures, if input is empty, then it should display all figures, since the specific keyword is null
        $se = \request('search-context');

        //To include each figure with category name that match the searched input, make an array for all ids of categories that match
        //the search input. This can be done since the figure table has a column that references category id.
        $keys = [];
        $cats = Category::where('cat_name','like',"%$se%")->get();
        foreach ($cats as $cat){
           array_push($keys, $cat->cat_id);
        }

        //Select all figure where the figure name contains the searched input or category id is in the matched id array above and where the stock is more than 0
        $items = Figure::where('fig_name', 'like', "%$se%")->where('fig_stock','>',0)->orWhereIn('cat_id', $keys)->where('fig_stock','>',0)->paginate(6);

        //Append a key to put back value in input
        $items->appends(['search-context' => $se]);

        //Return view with figures contains criteria above
        return view("welcome")->with('figures', $items);
    }

    function getThis($id){
        //Getting a detail page of a figure
        $item = Figure::find($id);
        return view("detail", ['item' => $item]);
    }

    function addToCart(Request $request){
        //add a specified figure to the cart, the Add to Cart buttons for every figure on the blade template contain the figure's id value
        $itemId = $request->input('added');
        $stockRed = Figure::find($itemId);
        $userId = Auth::user()->id;

        //Search if there's an existing active cart already for an existing user id and figure id
        $cartExist = Cart::where('user_id', $userId)->where('fig_id', $itemId)->where('cart_active', true)->first();

        //if there's an existing one, increment the cart quantity with the maximum of the figure's stock
        if(!empty($cartExist)){
            if($cartExist->cart_qty < $stockRed->fig_stock) {
                $cartExist->cart_qty += 1;
                $cartExist->save();
            }
        }
        else{

            //if not, that create a new cart
            $cart = new Cart();
            $cart->fig_id = $itemId;
            $cart->user_id = $userId;
            $cart->cart_active = true;
            $cart->cart_qty = 1;
            $cart->save();
        }
        return back();
    }
}
