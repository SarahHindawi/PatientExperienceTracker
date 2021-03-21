<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Patient;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Auth;

class PatientLoginController extends Controller
{
    public function index()
    {
        //Checking if there is an Authenticated user and redirecting to dashboard as they do not need to login.

        if(Auth::guard('admin')->check() ){

            return redirect('/');
        }
        else if(Auth::guard('patient')->check()){
            return redirect('/');
        }

        return view('Patient_Login');
    }

    public function login(Request $request)
    {

        //Checking if there is an Authenticated user and redirecting to dashboard as they do not need to login Even thou this.
        //THis is a POST method however user cannot get here without the Login Pages Sign in Button.

        if(Auth::guard('admin')->check() ){

            return redirect('/');
        }
        else if(Auth::guard('patient')->check()){
            return redirect('/');
        }


        $this->validate($request, [
            'email' => 'required',
            'password' => 'required',
        ]);


        if(!Auth::guard('patient')->attempt(['email' => $request->input('email') , 'password' => $request->input('password')])) {
            return back()->with('status', 'Invalid login details');
        }

        return view("Admin_dashboard_page");

    }

}