<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Patient;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Illuminate\Support\Facades\Auth;

;

use Illuminate\Support\Facades\DB;

class PatientLoginController extends Controller
{


    public function index()
    {
        //Checking if there is an Authenticated user and redirecting to dashboard as they do not need to login.

        if (Auth::guard('admin')->check()) {

            return redirect('/');
        } else if (Auth::guard('patient')->check()) {
            return redirect('/');
        }

        return view('Patient_Login');
    }

    public function login(Request $request)
    {

        //Checking if there is an Authenticated user and redirecting to dashboard as they do not need to login Even thou this.
        //THis is a POST method however user cannot get here without the Login Pages Sign in Button.

        if (Auth::guard('admin')->check()) {

            return redirect('/');
        } else if (Auth::guard('patient')->check()) {
            return redirect('/');
        }


        $this->validate($request, [
            'email' => 'required',
            'password' => 'required',
        ]);


        //Check if Registration has been accepted if not redirect to'/' with alert.
        $acceptanceCheck = Patient::select('NewAccount')->where('email', $request->input('email'))->first();
        
        
        if($acceptanceCheck['NewAccount']){
            return redirect('/')->with('message', 'Account registration not yet reviewed.');
        }    
        //Attempt auth if password is incorrect redirect bacsk to page.
        if (!Auth::guard('patient')->attempt(['email' => $request->input('email'), 'password' => $request->input('password')])) {
            return redirect('/patientlogin')->with('message', 'Invalid login details');
        } 
        return redirect('/');
        }
}
