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

            //Conditional for Root Admin Dashboard instead to Admin Dashboard.
            if($adminType){
                return view('rootadmin_dashboard_page');
            }       

            //Otherwise Return admin dashboard.
            return view('admin_dashboard_page');
        }
        else if(Auth::guard('patient')->check()){
            //TODO return patient dashboard.
            return 'Patient logged in';
        }

        //TODO return guest(unauthenticated) user home screen.

        return 'No user logged in.';

    }
}
