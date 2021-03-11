<?php

namespace App\Http\Controllers;

use App\Models\PatientReport;
use App\Models\Patient;
use Illuminate\Http\Request;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Auth;


class PatientProfileSummaryController extends Controller
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
        
        $data = Patient::paginate(10);
        return view('ProfileSummary')->with('data' , $data);
    }

    public function search(Request $request)
    {
        if(!Auth::guard('admin')->check()){

            if(Auth::guard('patient')->check()){
                //TODO redirect to Patient Dashbaord with unauthorized message.
            }
            return redirect('/adminlogin');
        }  

        $data = \DB::table('patient_profile');
        if ($request->email) {
            $data = $data->where('email', 'LIKE', "%" . $request->email . "%");
        }
        if ($request->firstName) {
            $data = $data->where('firstName', 'LIKE', "%" . $request->firstName . "%");
        }
        if ($request->lastName) {
            $data = $data->where('lastName', 'LIKE', "%" . $request->lastName);
        }
        $data = $data->paginate(10);      
        
        return view('GenerateReport');
    }
}
