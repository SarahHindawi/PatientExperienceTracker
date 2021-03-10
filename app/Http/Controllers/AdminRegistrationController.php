<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Admin;

class AdminRegistrationController extends Controller
{

    public function index()
    {
        return view ('Registration.AdminRegistration');
    }

    public function register(Request $request)
    {


        $this->validate($request, [
            'email' => 'required',
            //'password' => 'required',
            'firstName' => 'required',
            'lastName' => 'required',
        ]);


        $existanceTest = Admin::where('Email', $request->input('email'))->first();

        if($existanceTest)
        {
            return "Registration Failure: Admin already exists.";
        }


        $admin = new Admin();

        $admin->Email = $request->input('email');
        $admin->Password = '';
        $admin->FirstName = $request->input('firstName');
        $admin->LastName = $request->input('lastName');

        $admin->save();

        return view("signreq");
    }
}
