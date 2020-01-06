<?php

namespace App\Http\Controllers;

use App\Category;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Input;

class CategoryController extends Controller
{
    //Return all of categories to category list view
    function showCategories(){
        $cats = Category::all();

        return view('viewcategories')->with('categories', $cats);
    }

    //Unlike the other inserting and editing method of another controllers, this one uses the same view file, as such the need to specify
    //which method is used, we pass a flagging variable

    //return view for inserting a category
    function insertCat(){
        return view('managecategory', ['edit' => false]);
    }

    //return view for updating a category of specified id from the url
    function editCat($id){
        $item = Category::findOrFail($id);
        return view('managecategory', ['category' => $item, 'edit' => true]);
    }

    //
    function editing(Request $request){
        $catID = $request->input('submit');
        $request->validate([
            'name'=>'required|string|min:5'
        ]);
        $cat = Category::findOrFail($catID);
        $cat->cat_name = $request->input('name');
        $cat->save();

        return redirect('manageCategory/');
    }

    //deleting a category when the delete button containing the category id is clicked
    function deleting(Request $request){
        $catID = $request->input('deleted');
        Category::destroy($catID);
        return redirect('manageCategory/');
    }

    //the logic on inserting the category
    function inserting(Request $request){
        //validate input
        $request->validate([
            'name'=>'required|string|min:5'
        ]);

        //create the new category
        $cat = new Category();
        $cat->cat_name = $request->input('name');
        $cat->save();

        //redirect to category list view
        return redirect('manageCategory/');
    }
}
