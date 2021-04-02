<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Admin;
use Illuminate\Support\Facades\Hash;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Auth;
use Illuminate\Support\Facades\Mail;
use App\Mail\AdminReg;

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

        //Check Authenticated Administrator type redirect to dashboard if authenticated admin is not Root.
        $adminType = Auth::guard('admin')->user()->RootAdmin;
        if(!$adminType){
            return redirect('/')->with('message', 'Unauthorized Admin');
        }
      return view ('RegisterAdmin');

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

        //Check Authenticated Administrator type redirect to dashboard if authenticated admin is not Root.
        $adminType = Auth::guard('admin')->user()->RootAdmin;
        if(!$adminType){
            return redirect('/')->with('message', 'Unauthorized Admin');
        }

        $this->validate($request, [
            'firstname' => 'required',
            'password' => 'required|min:6',
            'lastname' => 'required',
            'email' => 'required',
        ]);


        $existanceTest = Admin::where('Email', $request->input('email'))->first();

        if($existanceTest)
        {
            return redirect('/')->with('message', 'Admin registration failed Email already exists.');
        }


        $admin = new Admin();

        $admin->email = $request->input('email');
        $admin->password = Hash::make($request->input('password'));
        $admin->firstname = $request->input('firstname');
        $admin->lastname = $request->input('lastname');

        $admin->save();

        $details = [
            'temppass' => $request->input('password')
        ];

        Mail::to($request->input('email'))->send(new AdminReg($details));


        return redirect('/')->with('message', 'Admin registration successful.');
    }
}
