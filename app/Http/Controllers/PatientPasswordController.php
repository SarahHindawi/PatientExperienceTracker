<?php

namespace App\Http\Controllers;

use App\Models\Admin;
use App\Models\Patient;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;

class PatientPasswordController extends Controller
{
    public function create()
    {

        //Checking if an Admin is not logged in if they are not redirect to adminlogin page.
//        if(!Auth::guard('admin')->check()){
//
//            if(Auth::guard('patient')->check()){
//                //If Patient logged in Redirect to Patient Dashboard.
//                return redirect('/');
//            }
//            return redirect('/adminlogin');
//        }

        return view('PatientTemporaryPasswordChange');
    }

    public function store(Request $request)
    {

        //Checking if an Admin is not logged in if they are not redirect to adminlogin page.
//        if(!Auth::guard('admin')->check()){
//
//            if(Auth::guard('patient')->check()){
//                 //If Patient logged in Redirect to Patient Dashboard.
//                 return redirect('/');
//            }
//            return redirect('/adminlogin');
//        }

        $this->validate($request, [
            'newPassword' => 'required|min:6|regex:/^(?=.*[a-z])(?=.*[A-Z])(?=.*\d).+$/'
        ]);


        //TODO get logged in user email

        $email = 'testpatientone@test.ca';

        Patient::where('Email', $email)->update(array('Password' => "false", "Password" => $request->input('newPassword')));


        return ("success");
    }
}
