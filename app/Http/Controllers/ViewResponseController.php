<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ViewResponseController extends Controller
{
    public function create()
    {
        //Checking if an Admin is not logged in if they are not redirect to adminlogin page.
        if(!Auth::guard('admin')->check()){

            if(Auth::guard('patient')->check()){
                //If Patient logged in Redirect to Patient Dashboard.
                return redirect('/');
            }
            return redirect('/adminlogin');
        }


        $responses = $_POST['responses'];
        return view('preview_responses')->with('responses', $responses );
    }
}
