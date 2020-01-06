<?php

namespace App\Http\Controllers;

use App\Figure;
use Illuminate\Http\Request;
use Illuminate\Pagination\Paginator;

class FigureController extends Controller
{
    // return figure list view with 6 items pagination per page
    function showFigures(){
        $figures = Figure::paginate(6);

        return view('viewfigures', ['figures'=> $figures]);
    }

    // return view for editing figure with specified id
    function editFig($itemID){
        $item = Figure::findOrFail($itemID);
        return view('managefigure', ['item' => $item]);
    }

    // return view for inserting a new figure
    function insertFig(){
        return view('insertfigure');
    }

    //backend logic for editing
    function editing(Request $request){
        //id from value of the update button
        $itemID = $request->input('edited');

        //validating the inputs to match criteria needed
        $request->validate([
            'name' => 'required|string|min:5',
            'cat' => 'required',
            'price' => 'required|numeric|min:100000',
            'desc' => 'required|string|min:10',
            'stock' => 'required|numeric|min:1',
            'pic' => 'required|image|mimes:jpeg, png, jpg'
        ]);

        //Update the figure's fields
        $item = Figure::findOrFail($itemID);
        $item->fig_name = $request->input('name');
        $item->fig_desc = $request->input('desc');
        $item->cat_id = $request->input('cat');
        $item->fig_price = $request->input('price');
        $item->fig_stock = $request->input('stock');

        $picture = uniqid().$request->pic->getClientOriginalName();
        $request->pic->move(storage_path('app/public/images'), $picture);
        $item->fig_pic = $picture;

        $item->save();

        //redirect back to figure list view
        return redirect('manageFigure');
    }

    //function to delete figure of a specified figure id
    function deleting(Request $request){
        $itemID = $request->input('deleted');

        Figure::destroy($itemID);
        return redirect('manageFigure');
    }


    //function on inserting a new figure
    function inserting(Request $request){

        $request->validate([
            'name' => 'required|string|min:5',
            'cat' => 'required',
            'price' => 'required|numeric|min:100000',
            'desc' => 'required|string|min:10',
            'stock' => 'required|numeric|min:1',
            'pic' => 'required|image|mimes:jpeg,png,jpg'
        ]);
        $item = new Figure();
        $item->fig_name = $request->input('name');
        $item->fig_desc = $request->input('desc');
        $item->cat_id = $request->input('cat');
        $item->fig_price = $request->input('price');
        $item->fig_stock = $request->input('stock');


        $picture = uniqid().$request->pic->getClientOriginalName();
        $request->pic->move(storage_path('app/public/images'), $picture);
        $item->fig_pic = $picture;
        $item->save();
        return redirect('manageFigure');
    }
}
