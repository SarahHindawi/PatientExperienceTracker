<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Admin;
use App\Models\Patient;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Auth;

class DashboardController extends Controller
{
    public function index(){

        if(Auth::guard('admin')->check()){
               
            $adminType = Auth::guard('admin')->user()->RootAdmin;
            $adminName = Auth::guard('admin')->user()->FirstName;            
            //Conditional for Root Admin Dashboard instead to Admin Dashboard.
            if($adminType){                
                return view('rootadmin_dashboard_page')->with('name', $adminName);
            }       

            //Otherwise Return admin dashboard.
            return view('admin_dashboard_page')->with('name', $adminName);
        }
        else if(Auth::guard('patient')->check()){
            //Get Authenticated Patient First name to display on dashboard.
            $patientName = Auth::guard('patient')->user()->FirstName;
            $tempPassCheck = Auth::guard('patient')->user()->PasswordReset;
            
            if((strcmp($tempPassCheck, "pending") === 0)){
                return redirect('/passwordchangepatient')->with('message', 'Temporary password detected please change below.');
            }
            return  view('patient_dashboard_page')->with('name', $patientName);
        }        

        //Return view for application landing page if no user is logged in.
        return view('guest_home_page');

    }
}
