<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Admin;
use Illuminate\Support\Facades\Hash;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Auth;

class AdminRegistrationController extends Controller
{

    public function index()
    {
        
        //Checking if an Admin is not logged in if they are not redirect to adminlogin page.
        if(!Auth::guard('admin')->check()){

            if(Auth::guard('patient')->check()){                
                //If Patient logged in Redirect to Patient Dashboard.
                return redirect('/');
            }
            return redirect('/adminlogin');
        }       
        
        return view ('Registration.AdminRegistration');
    }

    public function register(Request $request)
    {    
       
        //Checking if an Admin is not logged in if they are not redirect to adminlogin page.
        if(!Auth::guard('admin')->check()){

            if(Auth::guard('patient')->check()){
                 //If Patient logged in Redirect to Patient Dashboard.
                 return redirect('/');
            }
            return redirect('/adminlogin');
        }      
        
        $this->validate($request, [
            'email' => 'required',
            'password' => 'required|min:6|regex:/^(?=.*[a-z])(?=.*[A-Z])(?=.*\d).+$/',
            'firstName' => 'required',
            'lastName' => 'required',
        ]);


        $existanceTest = Admin::where('Email', $request->input('email'))->first();

        if($existanceTest)
        {
            return "Registration Failure: Admin already exists.";
        }


        $admin = new Admin();

        $admin->email = $request->input('email');
        $admin->password = Hash::make($request->input('password'));
        $admin->FirstName = $request->input('firstName');
        $admin->LastName = $request->input('lastName');

        $admin->save();

        return view("signreq");
    }
}
