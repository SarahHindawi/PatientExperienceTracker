<?php

namespace App\Http\Controllers;

use App\Models\Patient;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Auth;

class PasswordController extends Controller
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
        
        //get a list of the patients that submitted a request to reset their password
        $passwordResetRequests = Patient::select(['FirstName', 'LastName', 'Email'])->where("PasswordReset", "true")->get();

        $patientsInfo = [];
        for ($i = 0; $i < count($passwordResetRequests); $i++) {
            $patient = $passwordResetRequests->all()[$i]->toArray();
            $patient = $patient["FirstName"] . " " . $patient["LastName"] . " (" . $patient["Email"] . ")";
            $patientsInfo[] = $patient;
        }

        return view('Admin_reset_password', ["patients" => $patientsInfo]);
    }

    public function store()
    {

        //Checking if an Admin is not logged in if they are not redirect to adminlogin page.
        if(!Auth::guard('admin')->check()){

            if(Auth::guard('patient')->check()){
                //If Patient logged in Redirect to Patient Dashboard.
                return redirect('/');
           }
           return redirect('/adminlogin');
        }     

        $submittedData = $_POST['data'];
        unset($submittedData["_token"]);

        $accepted = [];
        $removed = [];

        //iterate over each returned element in the form, and check whether this patient was accepted or removed
        foreach ($submittedData as $key => $value) {
            $email = explode(" ", $key)[2];
            if ($value == "Accept") {
                $accepted[] = substr($email, 1, -1);

            } else {
                $removed[] = substr($email, 1, -1);
            }
        }


        //for each accepted password-reset request, create a temporary password ("pending" indicates that the patient has not set a permanent password yet)
        foreach ($accepted as $acceptedEmail) {
            $tempPassword = Str::random(8);
            Patient::where('Email', $acceptedEmail)->update(array('PasswordReset' => "pending", "Password" => $tempPassword));
        }

        foreach ($removed as $removedEmail) {
            Patient::where('Email', $removedEmail)->update(array('PasswordReset' => "false"));
        }

        return view("Admin_dashboard_page");
    }
}
