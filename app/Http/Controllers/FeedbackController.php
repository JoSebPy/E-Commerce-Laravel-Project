<?php

namespace App\Http\Controllers;

use App\Feedback;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Input;

class FeedbackController extends Controller
{
    //show all feedback from the database on the feedbacks list view
    function showFeedbacks(){
        $feeds = Feedback::all();

        return view('viewfeedbacks')->with('feeds', $feeds);
    }

    //function when receiving a specified url post method, and decide which function is to be used, based on existing key input
    //the input is based on the specified button's value
    function funcDecider(Request $request){
        if(Input::exists('idApp')){
            $this->feedApprove($request);
        }
        else if(Input::exists('idRej')){
            $this->feedReject($request);
        }

        //since it calls other function from this functon, the return redirect needs to be here
        return redirect('manageFeedback');

    }

    //Function to approve feedback
    function feedApprove(Request $request){
        $id = $request->input('idApp');

        $feed = Feedback::find($id);
        $feed->feed_status = "approved";
        $feed->save();

    }

    //Function to reject feedback
    function feedReject(Request $request){
        $id = $request->input('idRej');

        $feed = Feedback::find($id);
        $feed->feed_status = "rejected";
        $feed->save();

    }

    //return view for inserting a feedback
    function insertFeedback(){
        return view('myfeedback');
    }

    //logic for inserting feedback (validation & creation)
    function inserting(Request $request){
        $request->validate([
            'text' => 'required|string|min:5'
        ]);

        $feed = new Feedback();
        $feed->feed_desc = $request->input('text');
        $feed->save();

        return redirect('feedback');
    }

}
